<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['track_id', 'name', 'capacity'];
    
    protected $hidden = ['track_id'];

    public function track()
    {
        return $this->belongsTo(Track::class);
    }
}