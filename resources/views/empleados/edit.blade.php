<!-- <h1>Formulario de edici&oacute;n de los empleados</h1> -->

<form action="{{ url('/empleados/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('empleados.form',['modo'=>'Editar'])   <!-- ,['modo'=>'Editar'] es el texto a presentarle en el boton  -->
</form>