<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function deployments()
    {
        return $this->hasManyThrough(Deployment::class, Environment::class);
    }
}
