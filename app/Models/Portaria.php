<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portaria extends Model
{
    protected $fillable = [
        //campo número é criado sequencialmente. 0 a n para cada ano e reseta na virada. (Criar teste de número se é criado sequencialmente)
        'number',
        'year',
        'date',
        'title',
        'introduction',
        'content',
        'status',
        'created_by',
        'approved_by',
        'published_at'
    ];
}
