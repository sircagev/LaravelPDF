<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spipu\Html2Pdf\Html2Pdf;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        try {
            $idBuscar = $request->input('idBuscar');

            if ($idBuscar) {
                $users = User::where('id', $idBuscar)->get();
            } else {
                // Si no se proporciona un ID, obtén todos los usuarios
                $users = User::all();
            }

            return view('usuarios', compact('users'));

        } catch (\Exception $e) {
            return response()->json(['msg' => 'Error en la solicitud' . $e], 500);
        }
    }

    public function indexStore()
    {
        try {
            return view('usercreate');
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Error en la solicitud' . $e], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'cedula' => 'required|string|max:20|unique:users',
                'telefono' => 'required|string|max:15',
                'direccion' => 'required|string|max:255',
            ]);

            $user = User::create([
                'nombre' => $request->nombre,
                'cedula' => $request->cedula,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
            ]);
            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            return redirect()->route('home');
            ;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $user = User::findOrFail($id); // Busca al Usuario por su ID

            return view('userprofile',compact('user'));
        } catch (\Exception $e) {
            return response()->json(['msg' => 'error en la solicitud'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $user = User::findOrFail($id); // Busca el Usuario por su ID 
            $user->update($request->all()); // Actualiza el Usuario
            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            return response()->json(['msg' => 'error en la solicitud' . $e], 404);
        }
    }

    public function indexUpdate($id)
    {
        try {
            $user = User::find($id);
            return view('usercreate', compact('user'));
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Error en la solicitud' . $e], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $user = User::findOrFail($id); // Busca el Usuario por su ID
            $user->delete(); // Elimina el Usuario

            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'No se pudo eliminar el Usuario'
            ], 500);
        }
    }

    public function exportarPDF($id){
        try {
            $user = User::find($id); // Busca al Usuario por su ID

            $page = view('profile',compact('user'))->render();

            $pdf = new Html2Pdf();

            $pdf->writeHTML($page);

            $pdf->output('Profile_'.$user->nombre.'.pdf','D'); 
            
            /* return redirect()->route('usuarios.index'); */
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Download Failed: '.$e
            ], 500);
        }
    }
}