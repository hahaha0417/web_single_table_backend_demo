<?php

namespace ha;

/*
// --------------------------------------------------------------------------
Load
// --------------------------------------------------------------------------
最簡載入，在hahaha_application內層處理Autoload
預設 hahaha_application_base Initial會載入Autoload
// --------------------------------------------------------------------------
*/
function Load(&$root)
{    
    require $root . '/framework/hahaha/base/hahaha_application_base.php';
    require $root . '/libraries\hahahalib\native\trait\hahaha_instance_trait.php';
    require $root . '/config/system_setting/hahaha_system_setting.php';
    require $root . '/config/system_setting/hahaha_system_setting_default.php';
    require $root . '/config/system_setting/hahaha_system_setting_local.php';
    require $root . '/app/hahaha_application.php';
}

/*
// --------------------------------------------------------------------------
Application
// --------------------------------------------------------------------------
一切都在hahaha_application內部處理
// --------------------------------------------------------------------------
*/
function Application($root, $callback, $parameter = [])
{
    /*
    // --------------------------------------------------------------------------
    監控
    // --------------------------------------------------------------------------
    Begin
    // --------------------------------------------------------------------------
    */
    if(isset($parameter['monitor']) && $parameter['monitor'])
    {
        require $root . '/framework/hahaha/trait/hahaha_instance_trait.php';
        require $root . '/app/hahaha_monitor.php';
        $monitor_ = \hahaha\hahaha_monitor::Instance();
        $monitor_->Begin();
    }

    /*
    // --------------------------------------------------------------------------
    監控
    // --------------------------------------------------------------------------
    Design
    // --------------------------------------------------------------------------
    */
    if(isset($parameter['monitor']) && $parameter['monitor'])
    {
        $monitor_->Design();
    }

    /*
    // --------------------------------------------------------------------------
    執行
    // --------------------------------------------------------------------------
    
    // --------------------------------------------------------------------------
    */
    if(isset($parameter['application']) && $parameter['application'])
    {
        Load($root);
        //  application callback
        $callback();
    }
    
    /*
    // --------------------------------------------------------------------------
    監控
    // --------------------------------------------------------------------------
    End
    // --------------------------------------------------------------------------
    */
    if(isset($parameter['monitor']) && $parameter['monitor'])
    {
        $monitor_->End();
    }
}

