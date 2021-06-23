<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados'] = empleado::paginate(5); //variable para almacenar la informacion de la base y se la pase al index;
        return view('empleados.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.add'); //add es el nombre del archivo que se llama .blade.php
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //la accion de registrar
    {
        //recibiendo toda la informacion y guardandola en la base
        // $datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token'); //QUITAR EL DATO TOKEN

        // preguntar algo antes de insertar
        if ($request->hasFile('foto')) {
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public');
            //aqui le decimos que si hay un archivo en el formulario del campo 'foto' lo agarro y lo subo
        }

        empleado::insert($datosEmpleado); //agarro el modelo e inserto los datos del empleado menos el _token

        // return response()->json($datosEmpleado);
        return redirect('empleados')->with('mensaje','Empleado registrado con éxito'); //mensaje con redireccionamiento
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(empleado $empleado)
    {
        //
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)  //el id ya se o estamos enviando
    {
        $empleado = empleado::findOrFail($id);  //busca la info con el id que le pasamos

        //la inofrmacion q se muestra pasa por la vista osea por el archivo de esa acrpeta
        return view('empleados.edit', compact('empleado')); //compac para pasar todos los datos
    }






    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEmpleado = request()->except(['_token', '_method']); //QUITAR EL DATO TOKEN y el method
        // preguntar algo antes de insertar
        if ($request->hasFile('foto')) {
            $empleado = empleado::findOrFail($id);  //busca la info con el id que le pasamos
            Storage::delete('public/' . $empleado->foto);
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public');
            //aqui le decimos que si hay un archivo en el formulario del campo 'foto' lo agarro y lo subo
        }

        empleado::where('id', '=', $id)->update($datosEmpleado);

        $empleado = empleado::findOrFail($id);  //busca la info con el id que le pasamos
        //la inofrmacion q se muestra pasa por la vista osea por el archivo de esa acrpeta
        return view('empleados.edit', compact('empleado')); //compac para pasar todos los datos


    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado = empleado::findOrFail($id);  //busca la info con el id que le pasamos

        if (Storage::delete('public/' . $empleado->foto)) {
            empleado::destroy($id);
        }
        return redirect('empleados')->with('mensaje','Empleado borrado con éxito'); //mensaje con redireccionamiento
    }
}
