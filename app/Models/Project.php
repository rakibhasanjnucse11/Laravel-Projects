<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'technologies', 'project_url', 'screenshot'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

