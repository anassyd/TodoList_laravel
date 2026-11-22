<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;


#[Fillable(['title', 'is_completed', 'due_date'])]
class Task extends Model
{

    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean',
            'due_date' => 'date',
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isOverdue(): bool
    {
        return $this->due_date && $this->due_date->lt(today()) && !$this->is_completed;
    }

    #[Scope]
    protected function active(Builder $query): void
    {
        $query->where('is_completed', false);
    }
    #[Scope]
    protected function completed(Builder $query): void
    {
        $query->where('is_completed', true);
    }
}
