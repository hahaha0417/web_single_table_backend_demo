<?php
/*
 * 原始 : hahaha
 * 維護 : 
 * 指揮 : 
 * ---------------------------------------------------------------------------- 
 * 決定 : name
 * ----------------------------------------------------------------------------
 * 說明 : 
 * ----------------------------------------------------------------------------   
    
 * ----------------------------------------------------------------------------

*/

namespace hahahalib;
// namespace hahahalib\server;

/*
注意 : c++ hahahalib 參考此實作

https://www.php.net/manual/en/function.socket-create.php
https://www.itread01.com/articles/1478023512.html *
*/
class hahaha_socket_udp_server{
    use \hahahalib\hahaha_instance_trait;
	use \hahahalib\hahaha_socket_trait;
	
	public $Socket_ = NULL;
	
    //-----------------------------------------------------------
    function __construct() {
		
	}
	
	function __destruct() {
		
    }
	
	//-----------------------------------------------------------
	// 初始化
	// 
	// 攬人寫法原則上到可以收送之前
	//-----------------------------------------------------------
	function Initial() {
		
    }
	
	//-----------------------------------------------------------
	// 
	//-----------------------------------------------------------
	/*
	// 選項查詢
	https://www.php.net/manual/en/function.socket-create.php
	*/
	public function Create($domain = AF_INET)
	{
		$this->Socket_ = socket_create($domain, SOCK_STREAM, SOL_TCP);
		return $this->Socket_;
		
	}		
	
	public function Bind($ip, $port)
	{
		return socket_bind($this->Socket_, $ip, $port);
	
	}

	
	
	//-----------------------------------------------------------
	// 
	//-----------------------------------------------------------

}