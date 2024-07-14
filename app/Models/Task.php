<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'tittle',
        'description',
        'user_id',
        'status',
        'due_date',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

}
