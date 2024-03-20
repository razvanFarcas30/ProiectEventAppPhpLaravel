<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'evenimente';
    public $fillable = ['id','nume', 'descriere','data', 'locatie', 'ora_start', 'durata'];

    public function speakers()
{
    return $this->belongsToMany(Speaker::class);
}
 public function sponsors()
{
    return $this->belongsToMany(Sponsor::class);
}
public function tickets()
    {
        return $this->hasMany(Ticket::class, 'id_evenimente');
    }
    
}
