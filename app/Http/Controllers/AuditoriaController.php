<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    public function index()
    {
        return Auditoria::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_auditoria' => 'required|date',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $auditoria = Auditoria::create($request->all());
        return response()->json($auditoria, 201);
    }

    public function show($id)
    {
        return Auditoria::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $auditoria = Auditoria::findOrFail($id);
        $auditoria->update($request->all());
        return response()->json($auditoria, 200);
    }

    public function destroy($id)
    {
        Auditoria::destroy($id);
        return response()->json(null, 204);
    }
}
