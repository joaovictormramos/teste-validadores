<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidade extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome_fantasia', 'razao_social', 'cnpj', 'bandeira_id'];

    public function bandeira(): BelongsTo
    {
        return $this->belongsTo(Bandeira::class);
    }

    public function colaboradores(): HasMany
    {
        return $this->hasMany(Colaborador::class);
    }
}
