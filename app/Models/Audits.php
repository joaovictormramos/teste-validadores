<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Audits extends Model
{
    protected $fillable = [
        'user_id',
        'tabela',
        'linha_id',
        'acao',
        'valor_antigo',
        'novo_valor'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
