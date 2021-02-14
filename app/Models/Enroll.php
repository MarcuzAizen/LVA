<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enroll extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillables = [
        'enrollment_officer_id',
        'student_id',
        'acad_year_id',
        'section_id',
        'student_remark_id',
        'semester'
    ];

    public function enrollmentOfficer()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function acadYear()
    {
        return $this->belongsTo(AcadYear::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function studentRemark()
    {
        return $this->belongsTo(StudentRemark::class);
    }
}
