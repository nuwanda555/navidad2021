@extends("layouts.app2")

@section('contenido')

    <style>
        #citas_doctor {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #calendario {
            width: 800px;
            margin: 0 auto;
        }

        #datos_doctor {
            text-align: center;
            padding: 15px;
        }

    </style>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">


    <div id="citas_doctor">
        <div id="datos_doctor">
            <h1>{{ $doctor->nombre }} {{ $doctor->apellidos }} ({{ $doctor->especialidad->especialidad }})</h1>
        </div>
        <div id="calendario" style="height: 800px;"></div>
    </div>


    <div id="cita_modal">

    </div>

    <script>
        function guardarCita(motivo, fechaHora) {
            $.ajax({
                url: '{{ route('citas.store') }}',
                type: 'POST',
                data: {
                    doctor_id: {{ $doctor->id }},
                    paciente_id: 3, //eso hay que quitarlo
                    fecha_hora: moment(fechaHora).format('YYYY-MM-DD HH:mm:ss'),
                    motivo: motivo,
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    console.log(data);
                    return;
                    calendar.addEvent({
                        id: data.id,
                        title: 'Cita',
                        start: fecha,
                        color: '#00a65a',
                        textColor: '#fff',
                        allDay: true,
                        editable: false,
                        startEditable: false,
                        durationEditable: false,
                        overlap: false,
                        rendering: 'background',
                        constraint: 'businessHours',
                    });
                },
                error: function(data) {
                    swal.fire({
                        icon: 'error',
                        title: 'Error: ' + data.responseJSON.error,
                    });
                }
            });
        }

        $(document).ready(function() {
            let calendarEl = document.getElementById('calendario'); //esto es javascript a pelo o vanilla javascript
            let calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                eventOverlap: false,
                selectable: true,
                slotLabelFormat: function(date) {
                    if (date.date.minute == 0)
                        return date.date.hour.toString().padStart(2, '0') + ':00';
                    return date.date.minute;
                },
                businessHours: { // Marcamos los horarios de atencion
                    daysOfWeek: [1, 2, 3, 4, 5], //dias de la semana
                    startTime: '{{ config('app.hora_inicio') }}',
                    endTime: '{{ config('app.hora_fin') }}',
                },
                selectConstraint: "businessHours",
                headerToolbar: { //lo que muestra el calendario en el encabezado
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                dateClick: function(info) { //info contiene información de donde hicimos click
                    if (moment().isAfter(info.date)) {
                        swal.fire({
                            icon: 'error',
                            title: 'Error: No puedes seleccionar una fecha pasada',
                        });
                        return;
                    }
                    const diaSemana = info.date.getDay(); //extraemos el día de la semana del evento (lunes=1, martes=2, etc, sabado=6, domingo=0)
                    if (diaSemana == 0 || diaSemana == 6) { //si es sabado o domingo no se permiten citas
                        swal.fire({
                            icon: 'error',
                            title: 'No se admiten citas los fines de semana'
                        });
                        return;
                    }
                    if (info.view.type == "dayGridMonth") { //si estamos en vista mensual pasar a vista diaria
                        this.changeView("timeGridWeek", info.dateStr);
                    } else {
                        if (info.view.type == "timeGridWeek") { //si estamos en vista semanal permitir grabar eventos
                            Swal.fire({
                                title: 'Motivo de la consulta',
                                input: 'textarea'
                            }).then(function(result) {
                                if (result.value) {
                                    guardarCita(result.value, info.date);
                                } else {
                                    swal.fire({
                                        icon: 'error',
                                        title: 'Debes indicar el motivo de la consulta'
                                    });
                                }
                            });
                        }

                    }
                },
                events: [ //cargar todas las citas de este doctor
                    @foreach ($citas as $cita)
                        {
                        title: '{{ Auth::guest() ? 'Reservado' : $cita->paciente->nombre }}',
                        start: '{{ $cita->fecha_hora }}',
                        end: '{{ $cita->fecha_hora->addMinutes(config('app.duracion_cita')) }}', //le sumo la duracion de la cita
                        color: '#00bcd4',
                        borderColor: '{{ $cita->confirmada ? 'green' : 'orange' }}',
                        backgroundColor: '{{ $cita->confirmada ? 'green' : 'orange' }}',
                        textColor: 'white',
                        },
                    @endforeach
                ],
            });
            calendar.render();
        });
    </script>

@endsection
