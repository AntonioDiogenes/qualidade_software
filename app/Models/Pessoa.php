<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'data_nascimento',
        'observacoes',
        'empresa_id'
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}