<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaConsumo extends Model
{
    use HasFactory;

    protected $table = 'nota_consumo';
    protected $fillable = ['user_id', 'value', 'date', 'reason', 'note_img'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
