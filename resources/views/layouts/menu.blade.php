<style>
    #botones_menu {
        display: flex;
        justify-content: space-between;
    }

</style>


<div id="botones_menu">
    <div id="menu_izquierda">
        <a class="btn btn-primary" href="{{ url('/') }}">Página principal</a>
        @if (!Auth::guest() && Auth::user()->esDoctor)
            <a class="btn btn-success" href="{{ url('/especialidades/grafica') }}">Gráfica de doctores por especialidad</a>
        @endif
    </div>
    <div id="menu_derecha">
        @if (Auth::guest())
            <a class="btn btn-primary" href="{{ url('/login') }}">Iniciar sesión</a>
        @else
            <a class="btn btn-warning" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
    </div>
</div>
