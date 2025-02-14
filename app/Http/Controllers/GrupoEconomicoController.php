<?php

namespace App\Http\Controllers;

use App\Exports\GrupoEconomicoExport;
use App\Http\Requests\StoreGrupoEconomicoRequest;
use App\Http\Requests\UpdateGrupoEconomicoRequest;
use App\Models\GrupoEconomico;
use App\Http\Services\GrupoEconomicoService;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class GrupoEconomicoController extends Controller
{
    protected $grupoEconomicoService;

    public function __construct(GrupoEconomicoService $grupoEconomicoService)
    {
        $this->grupoEconomicoService = $grupoEconomicoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = $this->grupoEconomicoService->getAll();
        return view('grupos.grupos_index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grupos.grupos_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrupoEconomicoRequest $request)
    {
        $data = $request->validated();
        $this->grupoEconomicoService->create($data);
        return redirect()->route('grupos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoEconomico $grupo)
    {
        $grupo = $this->grupoEconomicoService->getById($grupo->id);
        return view('grupos.grupos_show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrupoEconomico $grupo)
    {
        return view('grupos.grupos_edit', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrupoEconomicoRequest $request, GrupoEconomico $grupo)
    {
        $data = $request->validated();
        $id = $grupo->id;
        $this->grupoEconomicoService->update($id, $data);
        return redirect()->route('grupos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrupoEconomico $grupo)
    {
        $this->grupoEconomicoService->delete($grupo->id);
        return redirect()->route('grupos.index');
    }

    public function export()
    {
        return (new GrupoEconomicoExport)->download('grupos.xlsx');
    }
}
