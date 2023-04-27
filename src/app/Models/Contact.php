<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'content',
        'age',
        'gender',
    ];

    protected $guarded = [
        'created_at', 
        'updated_at'
    ];

    public function department() {
        return $this->belongsTo('App\Models\Department');
    }
}
