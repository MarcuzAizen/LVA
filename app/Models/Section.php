<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Track;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'capacity'];
    
    protected $hidden = ['track_id'];

    public function tracks()
    {
        return $this->belongsToMany(Track::class)
            ->withPivot('relationship');
    }
}
