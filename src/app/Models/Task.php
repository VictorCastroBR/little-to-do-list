<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['user_id', 'title', 'description', 'completed', 'completed_at'];

    protected function casts(): array
    {
        return [
            'completed' => 'bool'
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
