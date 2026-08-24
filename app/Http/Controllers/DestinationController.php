<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Lista todos los destinos.
     */
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    /**
     * Muestra el detalle de un destino específico.
     */
    public function show(int $id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            abort(404, 'Destino turístico no encontrado');
        }

        return view('destinations.show', compact('destination'));
    }

    /**
     * Procesa el formulario de contacto.
     */
    public function sendContact(Request $request, int $id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            abort(404);
        }

        $validated = $request->validate([
            'nombre'  => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'mensaje' => 'required|string|min:10|max:1000',
        ]);

        return redirect()->route('destinations.show', $id)
            ->with('success', '¡Gracias ' . $validated['nombre'] . '! Tu consulta sobre ' . $destination['titulo'] . ' fue enviada exitosamente.');
    }
}