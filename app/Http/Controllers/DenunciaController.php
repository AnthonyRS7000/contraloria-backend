<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    /**
     * Mostrar todas las denuncias.
     */
    public function index()
    {
        return response()->json(Denuncia::with('usuario')->get(), 200);
    }

    /**
     * Crear una nueva denuncia.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $denuncia = Denuncia::create($request->all());

        return response()->json([
            'message' => 'Denuncia creada exitosamente',
            'denuncia' => $denuncia,
        ], 201);
    }

    /**
     * Mostrar una denuncia específica.
     */
    public function show($id)
    {
        $denuncia = Denuncia::with('usuario')->find($id);

        if (!$denuncia) {
            return response()->json(['message' => 'Denuncia no encontrada'], 404);
        }

        return response()->json($denuncia, 200);
    }

    /**
     * Actualizar una denuncia.
     */
    public function update(Request $request, $id)
    {
        $denuncia = Denuncia::find($id);

        if (!$denuncia) {
            return response()->json(['message' => 'Denuncia no encontrada'], 404);
        }

        $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string',
            'estado' => 'sometimes|in:pendiente,aceptada,rechazada',
        ]);

        $denuncia->update($request->all());

        return response()->json([
            'message' => 'Denuncia actualizada exitosamente',
            'denuncia' => $denuncia,
        ], 200);
    }

    /**
     * Eliminar una denuncia.
     */
    public function destroy($id)
    {
        $denuncia = Denuncia::find($id);

        if (!$denuncia) {
            return response()->json(['message' => 'Denuncia no encontrada'], 404);
        }

        $denuncia->delete();

        return response()->json(['message' => 'Denuncia eliminada exitosamente'], 204);
    }
}
