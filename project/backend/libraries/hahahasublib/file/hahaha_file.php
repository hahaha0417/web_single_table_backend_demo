<?php

namespace hahaha;

use hahahasublib\hahaha_instance_trait;

/*
單表式後台generator

因為框架關係，我可能註冊到hahaha_menu，所以不做成static樣式，統一做成單例模式
同c++ hahahalib，組合的function放在hahaha_file_composite下，避免太亂
*/
class hahaha_file
{
    use hahaha_instance_trait;

    function __construct()
    {

    }

    public function File_Force_Contents(&$full_path, 
        &$contents, 
        $flags = 0 
    )
    {
        $parts_ = explode( '/', $full_path);
        array_pop( $parts_ );
        $dir_ = implode( '/', $parts_ );
       
        if( !is_dir( $dir_ ) )
        {
            mkdir($dir_, 0777, true);
        }    
       
        file_put_contents($full_path, 
            $contents, 
            $flags 
        );
        return true;

    }

    /*
    $contens array
    output : file(not array)
    */
    public function Save_Text(&$full_path, 
        &$contents, 
        $flags = 0 
    )
    {
        $buffer_ = implode("\n", $contents);
        $this->File_Force_Contents($full_path, 
            $buffer_,
            $flags
        );
        return true;

    }

}
