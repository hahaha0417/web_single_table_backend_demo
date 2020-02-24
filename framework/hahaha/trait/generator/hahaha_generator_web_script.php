<?php

namespace hahaha;

use hahaha\hahaha_generator_web_script_base;

class hahaha_generator_web_script extends hahaha_generator_web_script_base
{
    const SCRIPT_START = "<script>";
    const SCRIPT_END = "</script>";
    const STYLE_START = "<style>";
    const STYLE_END = "</style>";

    // ----------------------------------
    // 腳本區
    // ----------------------------------    
    
    // ----------------------------------   
    /*
    因為script有很多種，不一定是javascript
    專有名詞，所以J & S大寫
    */
    public function JavaScript_Begin(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        if($dynamic)
        {            
            \p_ha::Line($content, $tab_, self::SCRIPT_START);
            \p_ha::Tab($tab, ++$tab_count);
        }
        
    }

    public function JavaScript_End(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        if($dynamic)
        {
            \p_ha::Tab($tab, --$tab_count);
            \p_ha::Line($content, $tab, self::SCRIPT_END);
            \p_ha::Line($content, $tab_, ' ');
        }
        
    }
    // ----------------------------------   
    /*
    style
    專有名詞，所以大寫
    */
    public function CSS_Begin(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        if($dynamic)
        {            
            \p_ha::Line($content, $tab, self::STYLE_START);
            \p_ha::Tab($tab, ++$tab_count);
        }

    }

    public function CSS_End(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        if($dynamic)
        {
            \p_ha::Tab($tab, --$tab_count);
            \p_ha::Line($content, $tab, self::STYLE_END);
            \p_ha::Line($content, $tab_, ' ');
        }
        
    }
    // ----------------------------------   
    /*
    jQuery_Ready
    專有名詞，所以大寫
    */
    public function jQuery_Ready_Begin(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {        
        \p_ha::Line($content, $tab, '$(function() { ');
        \p_ha::Tab($tab, ++$tab_count); 

    }

    public function jQuery_Ready_End(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, '}); ');
        \p_ha::Line($content, $tab_, ' ');
        
    }
    // ----------------------------------    

    // ----------------------------------
    // 通用區塊
    // ----------------------------------   
    // 因為未來要移到我的框架，所以我拔掉laravel的樣式
    // ---------------------------------- 
    public function Header(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();

        \p_ha::Line($content, $tab_, '/*');
        \p_ha::Line($content, $tab_, '原始 : hahaha ');
        \p_ha::Line($content, $tab_, '維護 : '); 
        \p_ha::Line($content, $tab_, '指揮 : '); 
        \p_ha::Line($content, $tab_, '---------------------------------------------------------------------------------------------- ');
        \p_ha::Line($content, $tab_, '決定 : name ');
        \p_ha::Line($content, $tab_, '---------------------------------------------------------------------------- ');
        \p_ha::Line($content, $tab_, '-- 說明 : ');
        \p_ha::Line($content, $tab_, '---------------------------------------------------------------------------- ');    
        \p_ha::Line($content, $tab_, ' ');
        \p_ha::Line($content, $tab_, '---------------------------------------------------------------------------- ');
        \p_ha::Line($content, $tab_, ' ');
        \p_ha::Line($content, $tab_, '---------------------------------------------------------------------------------------------- ');
        \p_ha::Line($content, $tab_, '*/ ');
        \p_ha::Line($content, $tab_, ' ');
        
    }

    public function License(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();

        \p_ha::Line($content, $tab_, '/*');
        \p_ha::Line($content, $tab_, '---------------------------------------------------------------------------------------------- ');
        \p_ha::Line($content, $tab_, 'License : 金融 & 黨國及相關組織禁用，其餘參考MIT');
        \p_ha::Line($content, $tab_, '---------------------------------------------------------------------------- ');
        \p_ha::Line($content, $tab_, ' ');
        \p_ha::Line($content, $tab_, '---------------------------------------------------------------------------------------------- ');
        \p_ha::Line($content, $tab_, '*/ ');
        \p_ha::Line($content, $tab_, ' ');
        
    }

    public function Footer(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();

        \p_ha::Line($content, $tab_, '/*');
        \p_ha::Line($content, $tab_, '---------------------------------------------------------------------------------------------- ');
        \p_ha::Line($content, $tab_, 'Power By Hahaha Corp.');
        \p_ha::Line($content, $tab_, '---------------------------------------------------------------------------- ');
        \p_ha::Line($content, $tab_, ' ');
        \p_ha::Line($content, $tab_, '---------------------------------------------------------------------------------------------- ');
        \p_ha::Line($content, $tab_, '*/ ');
        \p_ha::Line($content, $tab_, ' ');        
    }

}
