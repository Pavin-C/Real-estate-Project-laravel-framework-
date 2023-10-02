<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Property;
class Favorite extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function favbelonguser()
    {
        return $this->belongsTo(User::class);
    }

    public function favbelongproperty()
    {
        return $this->belongsTo(Property::class,'property_id');
    }

}
