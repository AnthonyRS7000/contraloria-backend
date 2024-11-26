<?php

namespace App\Http\Controllers;

use App\Models\Supervision;
use Illuminate\Http\Request;

class SupervisionController extends Controller
{
    /**
     * Mostrar todas las supervisiones.
     */
    public function index()
    {
        return response()->json(Supervision::with('usuario')->get(), 200);
    }

    /**
     * Crear una nueva supervisión.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_supervision' => 'required|date',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $supervision = Supervision::create($request->all());

        return response()->json([
            'message' => 'Supervisión creada exitosamente',
            'supervision' => $supervision,
        ], 201);
    }

    /**
     * Mostrar una supervisión específica.
     */
    public function show($id)
    {
        $supervision = Supervision::with('usuario')->find($id);

        if (!$supervision) {
            return response()->json(['message' => 'Supervisión no encontrada'], 404);
        }

        return response()->json($supervision, 200);
    }

    /**
     * Actualizar una supervisión.
     */
    public function update(Request $request, $id)
    {
        $supervision = Supervision::find($id);

        if (!$supervision) {
            return response()->json(['message' => 'Supervisión no encontrada'], 404);
        }

        $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string',
            'fecha_supervision' => 'sometimes|date',
        ]);

        $supervision->update($request->all());

        return response()->json([
            'message' => 'Supervisión actualizada exitosamente',
            'supervision' => $supervision,
        ], 200);
    }

    /**
     * Eliminar una supervisión.
     */
    public function destroy($id)
    {
        $supervision = Supervision::find($id);

        if (!$supervision) {
            return response()->json(['message' => 'Supervisión no encontrada'], 404);
        }

        $supervision->delete();

        return response()->json(['message' => 'Supervisión eliminada exitosamente'], 204);
    }
}
