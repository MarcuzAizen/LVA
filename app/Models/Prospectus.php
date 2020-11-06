<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Prospectus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['track_id', 'subject_id', 'sem_to_offer'];
    
    protected $hidden = ['track_id', 'subject_id'];

    public function track()
    {
        return $this->belongsTo(Track::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
