<?php

namespace App\Http\Models\Backend;

// use App\Laravel_Library\Laravel\Illuminate\Database\Eloquent\Model_Ha as Model;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table="hahaha_backend.user";
    protected $primaryKey = 'no';
    public $timestamps = true;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

}
