<?php

namespace App\Http\Controllers;

use App\Exports\ColaboradorExport;
use App\Http\Requests\StoreColaboradorRequest;
use App\Http\Requests\UpdateColaboradorRequest;
use App\Models\Colaborador;
use App\Http\Services\ColaboradorService;
use App\Http\Services\UnidadeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColaboradorController extends Controller
{
    protected $colaboradorService;
    protected $unidadeService;

    public function __construct(ColaboradorService $colaboradorService, UnidadeService $unidadeService)
    {
        $this->colaboradorService = $colaboradorService;
        $this->unidadeService = $unidadeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colaboradors = $this->colaboradorService->getAll();
        return view('colaboradors.colaboradors_index', compact('colaboradors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = $this->unidadeService->getAll();
        return view('colaboradors.colaboradors_create', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColaboradorRequest $request)
    {
        $data = $request->validated();
        $this->colaboradorService->create($data);
        return redirect()->route('colaboradors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Colaborador $colaborador)
    {
        $colaborador = $this->colaboradorService->getById($colaborador->id);
        return view('colaboradors.colaboradors_show', compact('colaborador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colaborador $colaborador)
    {
        // var_dump($colaborador);
        $unidades = $this->unidadeService->getAll();
        return view('colaboradors.colaboradors_edit', compact('colaborador', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColaboradorRequest $request, Colaborador $colaborador)
    {

        $data = $request->validated();
        $this->colaboradorService->update($colaborador->id, $data);
        return redirect()->route('colaboradors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colaborador $colaborador)
    {
        $this->colaboradorService->delete($colaborador->id);
        return redirect(route('colaboradors.index'));
    }

    public function export()
    {
        return (new ColaboradorExport)->download('colaboradors.xlsx');
    }
}
