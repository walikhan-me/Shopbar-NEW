<?php

namespace App\Models;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdminCredential extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'useremail',
        'userpassword',
        'userrole',
        'usercity',
        
    ];

    protected $hidden = [
        'userpassword',
        
    ];
    public function setUserpasswordAttribute($value)
    {
        $this->attributes['userpassword'] = Hash::make($value);
    }
    public function order(){
        return $this->hasMany(Order::class,'user_id','id');
    }
}
