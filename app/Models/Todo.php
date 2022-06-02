<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    public const DEFAULT_STATUS = 'Todo';
    public const DEFAULT_DONE = 'Done';

    protected $fillable = ['user_id', 'project_id', 'description', 'status', 'views'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
