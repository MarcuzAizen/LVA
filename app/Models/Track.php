<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'grade_level'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'prospectuses')
            ->withPivot('sem_to_offer')
            ->withTimestamps();
    }
}
