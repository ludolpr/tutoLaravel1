<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    // nom au pluriel car un rôle peut regrouper plusieurs users
    // cardinalité 1,n
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
