<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'todo', 'is_completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
