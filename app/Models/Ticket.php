<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['id', 'tip_bilet', 'pret', 'id_evenimente'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_evenimente');
    }
}
