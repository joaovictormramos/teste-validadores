<?php

namespace App\Http\Controllers;

use App\Exports\BandeiraExport;
use App\Http\Requests\StoreBandeiraRequest;
use App\Http\Requests\UpdateBandeiraRequest;
use App\Models\Bandeira;
use App\Http\Services\BandeiraService;
use App\Http\Services\GrupoEconomicoService;
use Illuminate\Support\Facades\Storage;

class BandeiraController extends Controller
{
    protected $bandeiraService;
    protected $grupoEconomicoService;

    public function __construct(BandeiraService $bandeiraService, GrupoEconomicoService $grupoEconomicoService)
    {
        $this->bandeiraService = $bandeiraService;
        $this->grupoEconomicoService = $grupoEconomicoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bandeiras = $this->bandeiraService->getAll();
        return view('bandeiras.bandeiras_index', compact('bandeiras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupos = $this->grupoEconomicoService->getAll();
        return view('bandeiras.bandeiras_create', compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBandeiraRequest $request)
    {
        $data = $request->validated();
        $this->bandeiraService->create($data);
        return redirect()->route('bandeiras.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bandeira $bandeira)
    {
        $bandeira = $this->bandeiraService->getById($bandeira->id);
        return view('bandeiras.bandeiras_show', compact('bandeira'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bandeira $bandeira)
    {
        $grupos = $this->grupoEconomicoService->getAll();
        return view('bandeiras.bandeiras_edit', compact('bandeira', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBandeiraRequest $request, Bandeira $bandeira)
    {
        $data = $request->validated();
        $id = $bandeira->id;
        $this->bandeiraService->update($id, $data);
        return redirect()->route('bandeiras.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bandeira $bandeira)
    {
        $this->bandeiraService->delete($bandeira->id);
        return redirect(route('bandeiras.index'));
    }

    public function export()
    {
        return (new BandeiraExport)->download('bandeiras.xlsx');
    }
}
