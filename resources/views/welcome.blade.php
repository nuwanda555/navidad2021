@extends("layouts.app2")
<style>
    .container {
        display: flex;
        flex: auto;
    }

    .card {
        margin: 10px;
    }

    .doctores {
        width: 100%;
    }

    .foto_perfil {
        border-radius: 10px;
        border: 2px solid #fff;
        box-shadow: 1px 3px 4px 0px rgba(0, 0, 0, 0.51);
        margin-right: 10px;
    }

    #mapDiv {
        height: 500px;
        width: 100%;
        padding: 15px;
    }

</style>

@section('contenido')
    <div class="container">
        <div class="card" style="width: 30rem; padding: 10px;">
            <label for="especialidad_id">Especialidades médicas</label>
            <select id="especialidad_id" class="form-control"></select>
        </div>
        <div class="card doctores">
            <div class="card-header">
                <h3>Lista de doctores/as</h3>
            </div>
            <div class="card-body">
                <table id="tabla_doctores" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Cita</th>
                        </tr>
                    </thead>
                    <tbody id="doctores">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_mapa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 modal_body_map">
                            <div class="location-map" id="location-map">
                                <div id="mapDiv"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        const especialidades = {!! App\Models\Especialidad::orderBy('especialidad')->get(['id', 'especialidad as text', DB::raw('not activa as disabled')])->toJson() !!}

        function getMap(latitud, longitud) {
            var mapOptions = { //objeto para crear un mapa
                mapTypeId: Microsoft.Maps.MapTypeId.aerial,
                center: new Microsoft.Maps.Location(latitud, longitud),
                zoom: 15,
            };
            // Initialize the map
            map = new Microsoft.Maps.Map(document.getElementById("mapDiv"), mapOptions);
            const centro = new Microsoft.Maps.Location(latitud, longitud);
            const pushpin = new Microsoft.Maps.Pushpin(centro, {
                color: "green"
            });
            map.entities.push(pushpin);
        }


        $(document).ready(function() {
            $('#especialidad_id').select2({
                data: especialidades,
                placeholder: 'Seleccione una especialidad',
                language: 'es',
                allowClear: true
            });

            $('#tabla_doctores').on('click', '.enlace_poblacion', function() {
                const latitud = $(this).data('latitud');
                const longitud = $(this).data('longitud');
                getMap(latitud, longitud);
                $('#modal_mapa').modal('show');
            });



            let tabla = $("#tabla_doctres").DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                },
                "bDestroy": true,
                data: [],
                columns: [{
                        data: 'nombre'
                    },
                    {
                        data: 'apellidos'
                    },
                    {
                        data: 'poblacion'
                    }
                ]
            });

            $('#especialidad_id').val(null).trigger('change'); //limpiar el select

            $('#especialidad_id').change(function() { //cambiar la especialidad
                const especialidad_id = $(this).val();
                $.ajax({
                    url: `{{ url('/especialidades') }}/${especialidad_id}/doctores`,
                    success: function(data) {
                        console.log(data)
                        tabla.destroy();
                        $('#tabla_doctores').empty();
                        $('#tabla_doctores').DataTable({
                            language: {
                                url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                            },
                            "bDestroy": true,
                            data: data,
                            columns: [{
                                    data: 'nombre',
                                    title: 'Nombre',
                                    render: function(data, type, row) {
                                        return `<img class='foto_perfil' width='64px' src='/fotos/${row.foto}'>${data}`;
                                    }
                                },
                                {
                                    data: 'apellidos',
                                    title: 'Apellidos',
                                },
                                {
                                    data: 'poblacion.poblacion',
                                    title: 'Población',
                                    render: function(data, type, row) {
                                        return `<a class='enlace_poblacion' data-latitud='${row.latitud}'  data-longitud='${row.longitud}'  href='#'>${data}</a>`;
                                    }
                                },
                                {
                                    data: 'id',
                                    render: function(data, type, row) {
                                        return `<a href="{{ url('/calendario') }}/${data}">Pedir cita</a>`;
                                    }
                                }
                            ]
                        });
                    }
                });

            })
        });
    </script>



@endsection
