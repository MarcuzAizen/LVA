<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['schedule_id', 'remarks', 'date'];

    protected $hidden = ['updated_at', 'deleted_at'];

    const CREATED_AT = 'date';

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
