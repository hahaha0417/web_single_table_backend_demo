<?php

/*
// --------------------------------------------------------------------------
原始 : hahaha
維護 : hohoho
指揮 : commander
// --------------------------------------------------------------------------
決定 : name
// --------------------------------------------------------------------------
說明 : 
// --------------------------------------------------------------------------

// --------------------------------------------------------------------------
*/

namespace hahaha\view\web\front;

/*
視圖
*/
class index_view extends \hahaha\hahaha_view_base
{
    use \hahahalib\hahaha_instance_trait;

	function __construct()
	{   
        // 找不到method時要用
		parent::__construct();
	}

    /*
    基本
    */
    public function Index($view)
    {
        $view_ = \hahahalib\hahaha_view::Instance();
        $system_setting_ = \ha\System_Setting::Get();

// --------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
        $view_->View([
            // 模組
            // [\hahaha\view\web\common\main_view::Instance(), "Meta"],
            // [\hahaha\view\web\common\sub_view::Instance(), "Meta"],
            // [\hahaha\view\web\common\main_view::Instance(), "Css"],
            // [\hahaha\view\web\common\sub_view::Instance(), "Css"],
            // [\hahaha\view\web\common\main_view::Instance(), "Script"],
            // [\hahaha\view\web\common\sub_view::Instance(), "Script"],
        ]);
        
    ?>
    <link rel="stylesheet" href="/assets/web/front/index.css<?= $system_setting_->Asset->Version ?>">
    <script src="/assets/web/front/index.js<?= $system_setting_->Asset->Version ?>"></script>


    <?php
    // 基於現在瀏覽器下載是並行的，因此程式碼檔案太多並不會嚴重影響效能，因此盡可能的拆成分散式模組
    ?>

    </head>
    <body>     
    <?php
    // $view_->View([
    //    // 模組
    //    [\hahaha\view\module\front\common_nav_main_nav_view::Instance(), "Index"],
    //]);
    // --------------------------------------------------------------------------
    ?>   
	
    <?php   
    // --------------------------------------------------------------------------
    ?>  
    </body>
</html>
<?php
// --------------------------------------------------------------------------
    }

 

    

}
