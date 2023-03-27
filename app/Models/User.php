<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'name',
        'email',
        'phone',
        'dob',
        'age',
        'country',
        'view_st',
        'view_in',
        'view_ad',
        'view_ta',
        'add_st',
        'add_in',
        'add_ad',
        'add_co',
        'add_ta',
        'edit_st',
        'edit_in',
        'edit_ad',
        'edit_co',
        'edit_ta',
        'delete_st',
        'delete_in',
        'delete_ad',
        'delete_co',
        'delete_ta',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'user_id');
    }

    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class, 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }

    public function userTasks()
    {
        return $this->hasMany(UserTask::class, 'user_id');
    }
}
