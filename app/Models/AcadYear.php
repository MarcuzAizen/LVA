<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcadYear extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['start', 'end'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = $value;
        $this->attributes['end'] = $value + 1;
    }
}
