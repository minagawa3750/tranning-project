<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'manager_name',
    ];

    protected $guarded = [
        'created_at', 
        'updated_at',
        'deleted_at',
    ];

    public function contact() {
        return $this->hasMany("App\Models\Contact");
    }
}
