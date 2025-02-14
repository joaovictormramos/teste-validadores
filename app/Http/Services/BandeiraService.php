<?php

namespace App\Http\Services;

use App\Auditable;
use App\Models\Bandeira;
use App\Models\GrupoEconomico;

class BandeiraService
{
    use Auditable;

    public function getAll()
    {
        return Bandeira::with('grupoEconomico')->get();
    }

    public function getById($id)
    {
        return Bandeira::findOrFail($id);
    }

    public function create(array $data)
    {
        $bandeira = Bandeira::create($data);
        $this->logAudit('bandeiras', $bandeira->id, 'created', null, $data);
        return $bandeira;
    }

    public function update($id, array $data)
    {
        $bandeira = Bandeira::findOrFail($id);
        $oldData = $bandeira->toArray();
        $bandeira->update($data);
        $this->logAudit('bandeiras', $bandeira->id, 'updated', $oldData, $data);
        return $bandeira;
    }

    public function delete($id)
    {
        $bandeira = Bandeira::findOrFail($id);
        $oldData = $bandeira->toArray();
        $bandeira->delete();
        $this->logAudit('bandeiras', $bandeira->id, 'deleted', $oldData, null);
    }
}
