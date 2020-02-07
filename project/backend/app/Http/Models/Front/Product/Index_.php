<?php

namespace App\Http\Models\Front\Product;

// use App\Laravel_Library\Laravel\Illuminate\Database\Eloquent\Model_Ha as Model;
use Illuminate\Database\Eloquent\Model;

class Index_ extends Model
{

    protected $table="hahaha_front_product.index_";
    protected $primaryKey = 'no';
    public $timestamps = true;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    // 批量賦值
    // 你也可以使用 create 方法來在一行間儲存一個新的模型。被新增的模型實例將會從你的方法回傳。
    // 然而，在這樣做之前，你需要在你的模型上指定一個 fillable 或 guarded 屬性，
    // 因為所有的 Eloquent 模型有針對批量賦值（Mass-Assignment）做保護。
    protected $guarded = [];

}
