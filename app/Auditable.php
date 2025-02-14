<?php

namespace App;

use App\Models\Audits;
use Illuminate\Support\Facades\Auth;

trait Auditable
{
    public function logAudit($table, $rowId, $action, $oldValues = null, $newValues = null)
    {
        Audits::create([
            'user_id' => optional(Auth::user())->id,
            'tabela' => $table,
            'linha_id' => $rowId,
            'acao' => $action,
            'valor_antigo' => $oldValues ? json_encode($oldValues) : null,
            'novo_valor' => $newValues ? json_encode($newValues) : null,
        ]);
    }
}
