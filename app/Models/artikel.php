<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';
    protected $guarded = ['id'];

    public function kategori(){
        return $this->belongsTo(kategori::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
