<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['enroll_id', 'schedule_id', 'mark', 'quarter_sem'];

    protected $hidden = ['enroll_id', 'schedule_id'];

    public function enroll()
    {
        return $this->belongsTo(Enroll::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
