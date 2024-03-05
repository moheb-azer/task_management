<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public const STATUS_SELECT = [
        'Todo',
        'In progress',
        'Done'
    ];
    protected $fillable = [
        'task',
        ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
