<?php

namespace App\Http\Controllers;

use App\Models\Asesoria;
use Illuminate\Http\Request;

class AsesoriaController extends Controller
{
    /**
     * Mostrar todas las asesorías.
     */
    public function index()
    {
        return response()->json(Asesoria::with('usuario')->get(), 200);
    }

    /**
     * Crear una nueva asesoría.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_asesoria' => 'required|date',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $asesoria = Asesoria::create($request->all());

        return response()->json([
            'message' => 'Asesoría creada exitosamente',
            'asesoria' => $asesoria,
        ], 201);
    }

    /**
     * Mostrar una asesoría específica.
     */
    public function show($id)
    {
        $asesoria = Asesoria::with('usuario')->find($id);

        if (!$asesoria) {
            return response()->json(['message' => 'Asesoría no encontrada'], 404);
        }

        return response()->json($asesoria, 200);
    }

    /**
     * Actualizar una asesoría.
     */
    public function update(Request $request, $id)
    {
        $asesoria = Asesoria::find($id);

        if (!$asesoria) {
            return response()->json(['message' => 'Asesoría no encontrada'], 404);
        }

        $request->validate([
            'tema' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string',
            'fecha_asesoria' => 'sometimes|date',
        ]);

        $asesoria->update($request->all());

        return response()->json([
            'message' => 'Asesoría actualizada exitosamente',
            'asesoria' => $asesoria,
        ], 200);
    }

    /**
     * Eliminar una asesoría.
     */
    public function destroy($id)
    {
        $asesoria = Asesoria::find($id);

        if (!$asesoria) {
            return response()->json(['message' => 'Asesoría no encontrada'], 404);
        }

        $asesoria->delete();

        return response()->json(['message' => 'Asesoría eliminada exitosamente'], 204);
    }
}
