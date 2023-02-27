<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Task extends Model
{
    use HasFactory;

    public function scopeByuserid($query, $value)
    {
        return $query->where('user_id', $value);
    }

    public function saveTask($taskText)
    {
        $this -> name = $taskText;
        $this -> user_id = Auth::id();
        //$Task->save();
        return $this;
    }
}
