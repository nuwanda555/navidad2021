@extends("layouts.app2")

@section('contenido')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <canvas id="bar-chart" width="800" height="450"></canvas>

    <script>
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: ['{!! $nombreEspecialidades !!}'],  //las comillas es para que la primera y la ultima especialidad tengan comillas al principio y final
                datasets: [{
                    label: "Num. doctores/as",
                    backgroundColor: [{!! $colores !!}],
                    data: [{!! $cantidadDoctores !!}],
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Número de doctores/as por especialidad'
                }
            }
        });
    </script>



@endsection
