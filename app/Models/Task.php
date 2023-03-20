<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'note',
        'sub_date',
        'sub_time',
    ];

    public function userTasks()
    {
        return $this->belongsTo(UserTask::class, 'task_id');
    }

}
