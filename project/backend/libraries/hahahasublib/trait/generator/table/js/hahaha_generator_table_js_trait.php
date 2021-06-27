<?php

namespace hahaha;

/*
太多才放到子namespace裡面
*/
trait hahaha_generator_table_js_trait
{
    /*
    jQuery 用法
     -----------------------------------------------
    注意 :
     -----------------------------------------------
    這不是萬用產生器，綁laravel single table
    "重點在簡化撰寫"
     -----------------------------------------------
    */
    public function Button_Click_Table_Deal(
        &$content,
        &$dynamic = false,
        &$tab = "",
        &$tab_count = 0,
        &$button,        // jquery 用法
        &$form,          // jquery 用法
        //
        $prepare_callback = NULL,        // 送出前的js程式碼
        &$data = [],                      // 攜帶的data
        &$success_reload = true
    )
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $use_ = &$parameter_->Use;

        // --------------------------------------------------------

        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Form_Identify}').submit(function() { ");
        \p_ha::Tab($tab, ++$tab_count);
        if(!empty($prepare_callback))
        {
            $prepare_callback();
        }

        \p_ha::Line($content, $tab, "return false;");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "}); ");
        \p_ha::Line($content, $tab, " ");

        // ------------------------------------------------------------
        // click
        // ------------------------------------------------------------
        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Button_Add_Identify}').click(function() { ");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "// var item = {);");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "//     'account' : $('#accounts_panel_add_account').val(),");
        \p_ha::Line($content, $tab, "//     'password_new' : $('#accounts_panel_add_password').val(),");
        \p_ha::Line($content, $tab, "//     'password_confirm' : $('#accounts_panel_add_password_confirm').val(),");
        \p_ha::Line($content, $tab, "//     'email' : $('#accounts_panel_add_email').val(),");
        \p_ha::Line($content, $tab, "//     'gender' : $('.accounts_panel_add_gender[name=gender]:checked').val(),");
        \p_ha::Line($content, $tab, "//     'status' : $('#accounts_panel_add_status').val(),");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "// };");

        \p_ha::Line($content, $tab, "// var form_data = JSON.stringify(Object.fromEntries(new FormData($('#accounts_panel_add_form')[0]))); ");
        \p_ha::Line($content, $tab, "var form_data = Object.fromEntries(new FormData($('#accounts_panel_add_form')[0])); ");
        \p_ha::Line($content, $tab, "console.log(form_data); ");

        \p_ha::Line($content, $tab, "$.ajax({ ");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "url:'/backend/table/backend/accounts/list/deal', ");
        \p_ha::Line($content, $tab, "type:'POST', ");

        \p_ha::Line($content, $tab, "data:{ ");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "'_token': $('input[name=_token]').attr('value'), ");
        \p_ha::Line($content, $tab, "'deal': 'item', ");
        \p_ha::Line($content, $tab, "'method': 'add', ");
        \p_ha::Line($content, $tab, "'item': form_data, ");
        \p_ha::Line($content, $tab, "// 'target': 'image', ");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "}, ");
        \p_ha::Line($content, $tab, "success:function(response, status, xhr){ ");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "console.log(response); ");
        \p_ha::Line($content, $tab, "if(response.status == 0){ ");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "// 成功 ");
        \p_ha::Line($content, $tab, "layer.msg( ");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "response.msg, ");
        \p_ha::Line($content, $tab, "{ ");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "icon: 6, ");
        \p_ha::Line($content, $tab, "area: ['360px', '100px'], ");
        \p_ha::Line($content, $tab, "end: function(index, layero){ ");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "//do something ");
        \p_ha::Line($content, $tab, "location.reload(); ");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "} ");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "} ");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "); ");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "} ");
        \p_ha::Line($content, $tab, "else{ ");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "// 失敗失敗 ");
        \p_ha::Line($content, $tab, "layer.msg( ");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "response.msg, ");
        \p_ha::Line($content, $tab, "{ ");
        \p_ha::Tab($tab, ++$tab_count);

        \p_ha::Line($content, $tab, "icon: 5, ");
        \p_ha::Line($content, $tab, "area: ['360px', '100px'], ");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "} ");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "); ");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "} ");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "}, ");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "}); ");

        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "}); ");
    }

}
