<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'course';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'outcomes',
        'prerequisites',
        'provider',
        'session_date',
        'session_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function codes()
    {
        return $this->hasMany(Code::class, 'course_id');
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'course_id');
    }

    public function records()
    {
        return $this->hasMany(Record::class, 'course_id');
    }

    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class, 'course_id');
    }
}
