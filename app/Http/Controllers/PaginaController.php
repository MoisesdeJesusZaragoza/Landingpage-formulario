<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginaController extends Controller
{
    public function landingpage()
    {
        return view('paginas.landingpage');
    }

    public function contacto($codigo = null)
    {    
        

        if (!empty($codigo) && $codigo == '1234')
        {
            $nombre_default = 'Invitado';
            $correo_default = 'info@example.com';
        }
        else
        {
            $nombre_default = null;
            $correo_default = null;
        }
        
    return view('paginas.contacto', compact('nombre_default', 'correo_default'));
    }

    public function recibirFormContacto(Request $request)
    {
        //Recibir información
        // dd(
        //     $request->all(),
        //     $request->only('nombre', 'correo'),
        //     $request->except('_token'),
        //     $request->nombre,
        //     $request->input('nombre')
        // );
        
        //Validar
        $request->validate([
            'nombre' => 'required|max:255|min:3',
            'correo' => ['required', 'email'],
            'comentario' => 'required',
        ]);

        
        //Insertar a DB

        // DB::table('contactos')->insert([
        //     'nombre' => $request->nombre,
        //     'correo' => $request->correo,
        //     'comentario' => $request->comentario,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        //DB::table('contactos')->insert($request->except('_token'));

        // $contacto = new Contacto();
        // $contacto->nombre = $request->nombre;
        // $contacto->correo = $request->correo;
        // $contacto->comentario = $request->comentario;
        // $contacto->save();
        
        // Contacto::create([
        //     'nombre' => $request->nombre,
        //     'correo' => $request->correo,
        //     'comentario' => $request->comentario,
        // ]);

        //Insertar a DB
        Contacto::create([$request->all()]);

        //Redirigir
        return redirect('/contacto');
    }
}
