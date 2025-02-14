<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrupoEconomico extends Model
{
    public $timestamps = false;
    protected $fillable = ['group_name', 'cnpj'];

    public function bandeiras(): HasMany
    {
        return $this->hasMany(Bandeira::class);
    }
}
