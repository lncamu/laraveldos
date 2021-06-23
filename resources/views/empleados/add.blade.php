<!-- <h1>Formulario de creaci&oacute;n del empleado</h1> -->

<form action="{{ url('empleados') }}" method="post" enctype="multipart/form-data">

    @csrf
    <!-- llave de seguridad para saber si estamos en el mismo sistema, 
        automaticamnt laravel responde cdo enviemos la informacion al metodo storage -->

   @include('empleados.form',['modo'=>'Registrar'])   <!-- ,['modo'=>'Registrar'] es el texto a presentarle en el boton  -->

</form>