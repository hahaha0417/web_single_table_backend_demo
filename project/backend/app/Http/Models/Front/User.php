<?php

namespace App\Http\Models\Front;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table='user';
    protected $primaryKey = 'no';
    public $timestamps = false;
}
