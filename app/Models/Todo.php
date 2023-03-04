<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        "title", "description", "status_id",
        "user_created"
    ];

    protected $hidden = [
        "id"
    ];

    protected $casts = [
        "created_at" => "datetime:d-m-y",
        "updated_at" => "datetime:d-m-y"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
