<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

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
}
