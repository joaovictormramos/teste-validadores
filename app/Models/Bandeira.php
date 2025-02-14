<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bandeira extends Model
{
    /** @use HasFactory<\Database\Factories\BandeiraFactory> */
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['band_name', 'cnpj', 'grupo_economico_id'];

    public function grupoEconomico(): BelongsTo
    {
        return $this->belongsTo(GrupoEconomico::class);
    }

    public function unidades(): HasMany
    {
        return $this->hasMany(Unidade::class);
    }
}
