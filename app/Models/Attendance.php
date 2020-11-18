<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['schedule_id', 'remarks', 'date'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
