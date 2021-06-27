{{-- 原始 : hahaha --}}
{{-- 維護 :  --}}
{{-- 指揮 :  --}}
{{-- ---------------------------------------------------------------------------------------------- --}}
{{-- 決定 : name --}}
{{--
    ----------------------------------------------------------------------------
    說明 :
    ----------------------------------------------------------------------------

    ----------------------------------------------------------------------------
--}}
{{-- ---------------------------------------------------------------------------------------------- --}}

<?php

//
use hahaha\define\hahaha_define_base_key as key;
//
use hahaha\define\hahaha_define_command_aid_composer as define_composer;
use hahaha\define\hahaha_define_command_aid_env as define_env;
use hahaha\define\hahaha_define_command_aid_git as define_git;
use hahaha\define\hahaha_define_command_aid_migrate as define_migrate;
use hahaha\define\hahaha_define_command_aid_npm as define_npm;
use hahaha\define\hahaha_define_command_aid_tool as define_tool;
//
use hahaha\define\hahaha_define_command_aid_item as define_item;
//

/*
 ----------------------------------------
注意 : 此為呼叫GPL程式相關代碼
 ----------------------------------------
*/

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        {{--  目前是懶人用法，有需要再直接加入上面  --}}
        @include('web.common.main_meta')
        @include('web.common.sub_meta')

        @include('web.common.main_script')
        @include('web.common.sub_script')

        @include('web.common.main_css')
        @include('web.common.sub_css')

        <script src="{{\p_ha::Assets('libraries/common/library/ui/doc.js')}}" ></script>
        <script src="{{\p_ha::Assets('libraries/common/library/ui/iframe.js')}}" ></script>

        <?php // ------------------------------------------------- ?>
        <?php // define ?>
        <script src="{{\p_ha::Assets("libraries/common/template/page/aid/define/api.js")}}"></script>
        <script src="{{\p_ha::Assets("libraries/common/template/page/aid/define/item.js")}}"></script>
        <?php // command ?>
        <script src="{{\p_ha::Assets("libraries/common/template/page/aid/command/composer.js")}}"></script>
        <script src="{{\p_ha::Assets("libraries/common/template/page/aid/command/env.js")}}"></script>
        <script src="{{\p_ha::Assets("libraries/common/template/page/aid/command/git.js")}}"></script>
        <script src="{{\p_ha::Assets("libraries/common/template/page/aid/command/migrate.js")}}"></script>
        <script src="{{\p_ha::Assets("libraries/common/template/page/aid/command/npm.js")}}"></script>
        <script src="{{\p_ha::Assets("libraries/common/template/page/aid/command/tool.js")}}"></script>
        <?php // use ?>
        <script src="{{\p_ha::Assets("libraries/common/template/page/aid/aid.js")}}"></script>
        <?php // ------------------------------------------------- ?>

        <script>
            $(function(){

            });

        </script>

        <style>
            .container {
                /* https://pjchender.blogspot.tw/2017/10/bs-bootstrap-4-custom-container-and.html */
                /* 有預設樣式，要調整 */
                margin: 0;
                padding: 0;
                max-width: 100%;
            }

        </style>
        {{--  基於現在瀏覽器下載是並行的，因此程式碼檔案太多並不會嚴重影響效能，因此盡可能的拆成分散式模組  --}}

        <style>
            .row {
                margin-left: 0;
                margin-right: 0;
                width: 100%;
            }

            .btn_item
            {
                width: 160px;
                height: 120px;
                margin-left: 50px;
                margin-bottom: 20px;
            }
        </style>

    </head>
    <body style="background:rgba(255,210,210,1);" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

        <div style="background:rgba(190,255,190,1);">
                <hr />
                <h1>
                    輔助
                    <a class="btn btn-dark btn-lg" href="/backend/aid/env">
                        環境
                    </a>
                    <a class="btn btn-dark btn-lg" href="/backend/aid/tool">
                        工具
                    </a>
                    <a class="btn btn-dark btn-lg" href="/backend/aid/migrate">
                        Migrate
                    </a>
                    <a class="btn btn-dark btn-lg" href="/backend/aid/composer">
                        Composer
                    </a>
                    <a class="btn btn-dark btn-lg active" href="/backend/aid/git">
                        Git
                    </a>
                    <a class="btn btn-dark btn-lg" href="/backend/aid/npm">
                        Npm
                    </a>
                </h1>
                <hr />
            </div>
            <br />

        </div>

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "Base";
            $name = "base";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row" style="background:rgba(190,190,190,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "All";
            $name = "all";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row rol-6" style="width:50%;background:rgba(190,190,255,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>

            <div class="form-group row">
                <button type="button" data-command="<?php echo define_git::BASE_ALL_CLONE; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Clone
                </button>
                <button type="button" data-command="<?php echo define_git::BASE_ALL_PULL; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Pull
                </button>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "Frontend";
            $name = "frontend";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row" style="width:50%;background:rgba(190,190,255,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>

            <div class="form-group row">
                <button type="button" data-command="<?php echo define_git::BASE_FRONTEND_CLONE; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Clone
                </button>
                <button type="button" data-command="<?php echo define_git::BASE_FRONTEND_PULL; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Pull
                </button>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "Backend";
            $name = "backend";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row" style="width:50%;background:rgba(190,190,255,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>

            <div class="form-group row">
                <button type="button" data-command="<?php echo define_git::BASE_BACKEND_CLONE; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Clone
                </button>
                <button type="button" data-command="<?php echo define_git::BASE_BACKEND_PULL; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Pull
                </button>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "Api";
            $name = "api";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row" style="width:50%;background:rgba(190,190,255,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>

            <div class="form-group row">
                <button type="button" data-command="<?php echo define_git::BASE_API_CLONE; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Clone
                </button>
                <button type="button" data-command="<?php echo define_git::BASE_API_PULL; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Pull
                </button>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "Migrate";
            $name = "migrate";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row" style="width:50%;background:rgba(190,190,255,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>

            <div class="form-group row">
                <button type="button" data-command="<?php echo define_git::BASE_MIGRATE_CLONE; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Clone
                </button>
                <button type="button" data-command="<?php echo define_git::BASE_MIGRATE_PULL; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Pull
                </button>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "Hahahalib";
            $name = "hahahalib";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row" style="background:rgba(190,190,190,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "All";
            $name = "all";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row rol-6" style="width:50%;background:rgba(190,190,255,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>

            <div class="form-group row">
                <button type="button" data-command="<?php echo define_git::HAHAHALIB_ALL_CLONE; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Clone
                </button>
                <button type="button" data-command="<?php echo define_git::HAHAHALIB_ALL_PULL; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Pull
                </button>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "hahahalib";
            $name = "hahahalib";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row rol-6" style="width:50%;background:rgba(190,190,255,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>

            <div class="form-group row">
                <button type="button" data-command="<?php echo define_git::HAHAHALIB_HAHAHALIB_CLONE; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Clone
                </button>
                <button type="button" data-command="<?php echo define_git::HAHAHALIB_HAHAHALIB_PULL; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Pull
                </button>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "hahalib";
            $name = "hahalib";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row rol-6" style="width:50%;background:rgba(190,190,255,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>

            <div class="form-group row">
                <button type="button" data-command="<?php echo define_git::HAHAHALIB_HAHALIB_CLONE; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Clone
                </button>
                <button type="button" data-command="<?php echo define_git::HAHAHALIB_HAHALIB_PULL; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Pull
                </button>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "g_plib";
            $name = "g_plib";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row rol-6" style="width:50%;background:rgba(190,190,255,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>

            <div class="form-group row">
                <button type="button" data-command="<?php echo define_git::HAHAHALIB_G_PLIB_CLONE; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Clone
                </button>
                <button type="button" data-command="<?php echo define_git::HAHAHALIB_G_PLIB_PULL; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Pull
                </button>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "s_ulib";
            $name = "s_ulib";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row rol-6" style="width:50%;background:rgba(190,190,255,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>

            <div class="form-group row">
                <button type="button" data-command="<?php echo define_git::HAHAHALIB_S_ULIB_CLONE; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Clone
                </button>
                <button type="button" data-command="<?php echo define_git::HAHAHALIB_S_ULIB_PULL; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Pull
                </button>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <?php
            $title = "_f_lib";
            $name = "_f_lib";
        ?>
        <div class="form-group row" data-name="{{ $name }}">
            <div class="form-group row rol-6" style="width:50%;background:rgba(190,190,255,1);">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <br>

            <div class="form-group row">
                <button type="button" data-command="<?php echo define_git::HAHAHALIB__F_LIB_CLONE; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Clone
                </button>
                <button type="button" data-command="<?php echo define_git::HAHAHALIB__F_LIB_PULL; ?>" class="<?php echo key::COMMAND; ?> btn btn-dark col-lg-1 btn_item">
                    Pull
                </button>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------ --}}

        {{-- ------------------------------------------------------------------------------ --}}
        <script>
            $(function(){
                $(".<?php echo key::COMMAND; ?>").click(function() {
                    // define
                    const api_ = hahaha_page_aid_define_api;
                    const item_ = hahaha_page_aid_define_item;
                    // command
                    const composer_ = hahaha_page_aid_command_composer;
                    const env_ = hahaha_page_aid_command_env;
                    const git_ = hahaha_page_aid_command_git;
                    const migrate_ = hahaha_page_aid_command_migrate;
                    const npm_ = hahaha_page_aid_command_npm;
                    const tool_ = hahaha_page_aid_command_tool;

                    let command_ = $(this).data("<?php echo key::COMMAND; ?>");

                    let aid_ = new hahaha_page_aid;
                    aid_.Command(item_.GIT, command_);

                });

            });

            $(function(){
                if($(parent.document) && $(parent.document).find(".content_frame"))
                {
                    var iframe_ = $($(parent.document) && $(parent.document).find(".content_frame"));
                    $.each(iframe_, function(key, value){
                        value.onload = function(){
                            let ui_frame_ = new hahaha_ui_iframe;
                            ui_frame_.set_parent_iframe_height_by_id($(value).attr("id"));
                            iframe_.loaded = 1;
                        };
                    });

                    $(window).resize(function(){
                        $.each(iframe_, function(key, value){
                            let ui_frame_ = new hahaha_ui_iframe;
                            ui_frame_.set_parent_iframe_height_by_id($(value).attr("id"), false);
                        });

                    });
                }
            });

        </script>
        {{-- ------------------------------------------------------------------------------ --}}
    </body>

</html>

