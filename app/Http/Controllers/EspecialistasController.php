<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\EspecialistaRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Especialista;
use Illuminate\Database\QueryException;

class EspecialistasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('especialistas.index', ['especialistas' => Especialista::orderby('codigo')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('especialistas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EspecialistaRequest $request): RedirectResponse
    {
        $especialista = Especialista::create($request->validated());

        return redirect()->route('especialistas.index')
            ->with('mensaje', "Especialista {$especialista->nombre} creado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        return view('especialistas.show', ['especialista' => Especialista::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('especialistas.edit', ['especialista' => Especialista::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EspecialistaRequest $request, string $id): RedirectResponse
    {
        $especialista = Especialista::findOrFail($id);
        $especialista->update($request->validated());

        return redirect()->route('especialistas.show', $id)
            ->with('mensaje', "Especialista {$especialista->nombre} actualizado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $especialista = Especialista::findOrFail($id);

        try {
            $especialista->delete();
        } catch (QueryException $e) {
            return redirect()->route('especialistas.show', $id)
                ->with('error', "No se puede borrar a {$especialista->nombre}: tiene partes.");
        }

        return redirect()->route('especialistas.index')
                ->with('mensaje', "Especialista {$especialista->nombre} eliminado correctamente");
    }
}
