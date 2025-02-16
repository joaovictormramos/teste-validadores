<?php

namespace App\Http\Services;

use App\Models\Unidade;
use App\Auditable;

class UnidadeService
{
    use Auditable;

    public function getAll()
    {
        return Unidade::with('bandeira')->get();
    }

    public function getById($id)
    {
        return Unidade::findOrFail($id);
    }

    public function create(array $data)
    {
        $unidade = Unidade::create($data);
        $this->logAudit('unidades', $unidade->id, 'CRIAR', null, $data);
        return $unidade;
    }

    public function update($id, array $data)
    {
        $unidade = Unidade::findOrFail($id);
        $oldData = $unidade->toArray();
        $unidade->update($data);
        $this->logAudit('unidades', $unidade->id, 'ATUALIZAR', $oldData, $data);
        return $unidade;
    }

    public function delete($id)
    {
        $unidade = Unidade::findOrFail($id);
        $oldData = $unidade->toArray();
        $unidade->delete();
        $this->logAudit('unidades', $id, 'DELETAR', $oldData, null);
    }
}
