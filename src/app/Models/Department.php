<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function contact() {
        return $this->hasMany("App\Models\Contact", 'department_id', 'id');
    }
}
