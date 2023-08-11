<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Client extends Model
{
    use HasFactory;

    public function calendars()
    {
        return $this->hasMany(Calendar::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    function tasks(int $projectId): BelongsToMany
    {
        return $this->belongsToMany(Task::class)->where('project_id', $projectId);
    }

    function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    function toggleTask($projectId, $taskId)
    {
        $task = $this->tasks($projectId)->withPivot('status')->wherePivot('task_id', $taskId)->first();
        $status = $task->pivot->status;
        $toggle = $this->tasks($projectId)->updateExistingPivot($taskId, [
            'status' => !$status
        ]);
        return $task;
    }
}
