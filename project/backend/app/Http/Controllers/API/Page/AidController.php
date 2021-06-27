<?php

namespace App\Http\Controllers\API\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use hahaha\define\hahaha_define_base_key as key;

//
use hahaha\command\aid\hahaha_command_aid as command_aid;

/*
 ----------------------------------------
注意 : 此為呼叫GPL程式相關代碼
 ----------------------------------------
*/
class AidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function command()
    {
        $item_ = &$_POST[key::ITEM];
        $command_ = &$_POST[key::COMMAND];

        $dir_ = base_path() . "/" . key::BATCH_FILE;
        $command_aid_= command_aid::Instance()->Initial($dir_);

        $command_aid_->Command($item_, $command_);

    }


}
