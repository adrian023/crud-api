<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'priority_id'];


    public function Priority(): BelongsTo{
        return $this->belongsTo(Priority::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
