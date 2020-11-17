<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function acadYear()
    {
        return $this->belongsTo(AcadYear::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function prospectus()
    {
        return $this->belongsTo(Prospectus::class);
    }
}
