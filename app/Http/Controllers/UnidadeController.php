<?php

namespace App\Http\Controllers;

use App\Exports\UnidadeExport;
use App\Http\Requests\StoreUnidadeRequest;
use App\Http\Requests\UpdateUnidadeRequest;
use App\Models\Unidade;
use App\Http\Services\UnidadeService;
use App\Http\Services\BandeiraService;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UnidadeController extends Controller
{
    protected $unidadeService;
    protected $bandeiraService;

    public function __construct(UnidadeService $unidadeService, BandeiraService $bandeiraService)
    {
        $this->unidadeService = $unidadeService;
        $this->bandeiraService = $bandeiraService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidades = $this->unidadeService->getAll();
        return view('unidades.unidades_index', compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bandeiras = $this->bandeiraService->getAll();
        return view('unidades.unidades_create', compact('bandeiras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnidadeRequest $request)
    {
        $data = $request->validated();
        $this->unidadeService->create($data);
        return redirect()->route('unidades.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unidade $unidade)
    {
        $unidade = $this->unidadeService->getById($unidade->id);
        return view('unidades.unidades_show', compact('unidade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unidade $unidade)
    {
        $bandeiras = $this->bandeiraService->getAll();
        return view('unidades.unidades_edit', compact('unidade', 'bandeiras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnidadeRequest $request, Unidade $unidade)
    {
        $data = $request->validated();
        $id = $unidade->id;
        $this->unidadeService->update($id, $data);
        return redirect()->route('unidades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unidade $unidade)
    {
        $this->unidadeService->delete($unidade->id);
        return redirect(route('unidades.index'));
    }

    public function export()
    {
        return (new UnidadeExport)->download('unidades.xlsx');
    }
}
