<?php

namespace App\Http\Controllers;

use App\Models\Sancion;
use Illuminate\Http\Request;

class SancionController extends Controller
{
    /**
     * Mostrar todas las sanciones.
     */
    public function index()
    {
        return response()->json(Sancion::with('usuario')->get(), 200);
    }

    /**
     * Crear una nueva sanción.
     */
    public function store(Request $request)
    {
        $request->validate([
            'motivo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'monto' => 'required|numeric|min:0',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $sancion = Sancion::create($request->all());

        return response()->json([
            'message' => 'Sanción creada exitosamente',
            'sancion' => $sancion,
        ], 201);
    }

    /**
     * Mostrar una sanción específica.
     */
    public function show($id)
    {
        $sancion = Sancion::with('usuario')->find($id);

        if (!$sancion) {
            return response()->json(['message' => 'Sanción no encontrada'], 404);
        }

        return response()->json($sancion, 200);
    }

    /**
     * Actualizar una sanción.
     */
    public function update(Request $request, $id)
    {
        $sancion = Sancion::find($id);

        if (!$sancion) {
            return response()->json(['message' => 'Sanción no encontrada'], 404);
        }

        $request->validate([
            'motivo' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string',
            'monto' => 'sometimes|numeric|min:0',
        ]);

        $sancion->update($request->all());

        return response()->json([
            'message' => 'Sanción actualizada exitosamente',
            'sancion' => $sancion,
        ], 200);
    }

    /**
     * Eliminar una sanción.
     */
    public function destroy($id)
    {
        $sancion = Sancion::find($id);

        if (!$sancion) {
            return response()->json(['message' => 'Sanción no encontrada'], 404);
        }

        $sancion->delete();

        return response()->json(['message' => 'Sanción eliminada exitosamente'], 204);
    }
}
