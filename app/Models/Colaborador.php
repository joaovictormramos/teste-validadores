<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Colaborador extends Model
{
    public $timestamps = false;
    protected $fillable = ['colab_name', 'email', 'cpf', 'unidade_id'];

    public function unidade(): BelongsTo
    {
        return $this->belongsTo(Unidade::class);
    }
}
