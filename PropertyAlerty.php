<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PropertyAlerty extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function alertuser()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
