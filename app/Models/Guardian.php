<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guardian extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $appends = ['full_name'];

    protected $hidden = ['student_id'];

    public function students()
    {
        return $this->belongsToMany(Student::class)
            ->withPivot('relationship');
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = strtoupper($value);
    }

    public function getFullNameAttribute()
    {
        $suffix = ($this->attributes['suffix'] !== null) ? ", {$this->attributes['suffix']}" : '';
        return "{$this->attributes['last_name']}, {$this->attributes['first_name']}".$suffix;
    }
}
