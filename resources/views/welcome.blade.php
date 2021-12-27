@extends("layouts.app2")


@section('contenido')

    <div class="card" style="width: 30rem; padding: 10px;">
        <label for="especialidad_id">
            Especialidades médicas
            <select id="especialidad_id" class="form-control"></select>
    </div>

    <script>

        const especialidades={!! App\Models\Especialidad::orderBy("especialidad")->get(['id', 'especialidad as text'])->toJson() !!}

        $(document).ready(function() {
            $('#especialidad_id').select2({
                data: especialidades,
                placeholder: 'Seleccione una especialidad',
                language: 'es',
                allowClear: true
            });
        });
    </script>



@endsection
