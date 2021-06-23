<h1>Lista de los empleados <a href="{{ url('/empleados/create') }}" class="btn">Nuevo empleado</a></h1>

        @if(Session::has('mensaje'))   <!-- //si hay un mensaje lo muestra -->
            {{Session::get('mensaje')}}
        @endif
<table class="table table-light table-responsive">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>foto</th>
            <th>Nombre</tlocalhosth>
            <th>apellido paterno</th>
            <th>apellido materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{$empleado->id}}</td>
            <td>
                <img src="{{ asset('storage').'/'.$empleado->foto }}" width="10%">
            </td>
            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->apellido_paterno}}</td>
            <td>{{$empleado->apellido_paterno}}</td>
            <td>{{$empleado->correo}}</td>
            <td>
                <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}">Editar</a>
                |

                <form action="{{ url('/empleados/'.$empleado->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('Quieres borrar')" value="Eliminar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>