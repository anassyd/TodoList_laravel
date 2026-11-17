<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['title', 'is_completed'])]
class Task extends Model
{

    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean',
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
