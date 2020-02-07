<?php

namespace App\Http\Models\Front;

// use App\Laravel_Library\Laravel\Illuminate\Database\Eloquent\Model_Ha as Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

// https://github.com/jenssegers/laravel-mongodb/issues/702
class Third_Party_User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use AuthenticableTrait;

    protected $table="hahaha_front.third_party_user";
    protected $primaryKey = 'no';
    public $timestamps = true;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

}
