<h1>Formulario de {{ $modo }} datos de los empleados</h1>

<label for="Nombres">Nombres</label>
<input type="text" name="nombre" title="Nombres " class="" placeholder="Nombres " value="{{ isset($empleado->nombre)?$empleado->nombre:'' }}" required> <br>

<label for="Apellidos Paternos">Apellidos Paternos</label>
<input type="text" name="apellido_paterno" title="Apellidos Paternos" class="" placeholder="Apellidos Paternos" value="{{ isset($empleado->apellido_paterno)?$empleado->apellido_paterno:'' }}" required> <br>

<label for="Apellidos Maternos">Apellidos Maternos</label>
<input type="text" name="apellido_materno" title="Apellidos Maternos" class="" placeholder="Apellidos Maternos" value="{{ isset($empleado->apellido_materno)?$empleado->apellido_materno:'' }}" required> <br>

<label for="Correo electrónico">Correo electrónico</label>
<input type="enamil" name="correo" title="Correo electrónico" class="" placeholder="Correo electrónico" value="{{ isset($empleado->correo)?$empleado->correo:'' }}" required> <br>

<label for="Archivo de imagen">Foto</label>

<input type="file" name="foto" title="Archivo de imagen" class="" placeholder="Archivo de imagen" value="{{ isset($empleado->foto)?$empleado->foto:'' }}" required> <br>
@if(isset($empleado->foto))
<img src="{{ asset('storage').'/'.$empleado->foto }}" alt="10%" width="10%"> <br>
@endif

<br>
<input type="submit" value="{{ $modo }} datos">
<a href="{{ url('/empleados/') }}" class="btn">Ver todos</a>