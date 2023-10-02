<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Property;
class Userquery extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function userquery()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function propertyquery()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
    

