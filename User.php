<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Property;
use App\Models\Userquery;
use App\Models\Favorite;
use App\Models\PropertyAlerts;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password','image','gender','phone_number'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
   

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function queries()
    {
        return $this->hasMany(UserQuery::class);
    }

    public function propertyalerts() 
    {
        return $this->hasMany(PropertyAlerts::class);
    }

    public function userfav()
    {
        return $this->hasMany(Favorite::class,'user_id');
    }
}
