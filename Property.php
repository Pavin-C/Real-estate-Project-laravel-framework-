<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Userquery;

class Property extends Model
{
    use HasFactory,softDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function queries()
    {
        return $this->hasMany(Userquery::class,'property_id');
    }
    public function hasfavorite()
    {
        return $this->hasMany(Favorite::class);
    }
}

