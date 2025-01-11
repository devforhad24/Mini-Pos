<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Group extends Model
{
    protected $fillable = [
        'title',
    ];

    /**
    *  Getting array for select option   
    **/
    public static function arrayForSelect(){
        $arr = [];
        $groups = Group::all();
        foreach ($groups as $group){
            $arr[$group->id] = $group->title;
        }
        return $arr;
    }

    public function users(){
        return $this->hasMany(User::class);
    }

}
