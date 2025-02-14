<?php

namespace App\Http\Services;

use App\Auditable;
use App\Models\Colaborador;

class ColaboradorService
{
    use Auditable;

    public function getAll()
    {
        return Colaborador::with('unidade')->get();
    }

    public function getById($id)
    {
        return Colaborador::findOrFail($id);
    }

    public function create(array $data)
    {
        $colaborador = Colaborador::create($data);
        $this->logAudit('colaboradores', $colaborador->id, 'created', null, $data);
        return $colaborador;
    }

    public function update($id, array $data)
    {
        $colaborador = Colaborador::findOrFail($id);
        $oldData = $colaborador->toArray();
        $colaborador->update($data);
        $this->logAudit('colaboradores', $colaborador->id, 'updated', $oldData, $data);
        return $colaborador;
    }

    public function delete($id)
    {
        $colaborador = Colaborador::findOrFail($id);
        $oldData = $colaborador->toArray();
        $colaborador->delete();
        $this->logAudit('colaboradores', $colaborador->id, 'deleted', $oldData, null);
    }
}
