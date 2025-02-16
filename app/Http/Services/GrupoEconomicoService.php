<?php

namespace App\Http\Services;

use App\Models\GrupoEconomico;
use App\Auditable;

class GrupoEconomicoService
{
    use Auditable;

    public function getAll()
    {
        return GrupoEconomico::all();
    }

    public function getById($id)
    {
        return GrupoEconomico::findOrFail($id);
    }

    public function create(array $data)
    {
        $grupo = GrupoEconomico::create($data);
        $this->logAudit('grupo_economico', $grupo->id, 'CRIAR', null, $data);
        return $grupo;
    }

    public function update($id, array $data)
    {
        $grupo = GrupoEconomico::findOrFail($id);
        $oldData = $grupo->toArray();
        $grupo->update($data);
        $this->logAudit('grupo_economico', $grupo->id, 'ATUALIZAR', $oldData, $data);
        return $grupo;
    }

    public function delete($id)
    {
        $grupo = GrupoEconomico::findOrFail($id);
        $oldData = $grupo->toArray();
        $grupo->delete();
        $this->logAudit('grupo_economico', $id, 'DELETAR', $oldData, null);
    }
}
