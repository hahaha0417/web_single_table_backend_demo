<?php

namespace hahaha;

class hahaha_route_base
{
	function __construct()
	{

	}
	
	public function Run()
	{
		$global = \hahaha\hahaha_global::Instance();
		
		if($global->Route->Default)
		{
			$this->Run_Default();
			
		}
		else
		{
			$this->Run_Custom();
		}
		
		return $this;
	}
		
	/*
	預設路由
	*/
	public function Run_Default()
	{
		// 如有要換router，請在這裡改，framework底下的不要改，避免不好同步
		$route = \hahahalib\hahaha_route::Instance();
		
		// 參數樣式，必須有，不然不找參數
		$route->Parameter_Style("ha[", "]");
		
		// 用lite 加快速度
		$server = \hahahalib\external\lite\hahaha_external_variable_server_lite::Instance();
		$global = \hahaha\hahaha_global::Instance();
		// $server使用魔術方法_GET，將其初始化
		$server->Request_Uri;		
		// 設定路徑
		$route->Set_Uri($server->Request_Uri);
		// pass space
		$route->Pass_Space($global->Route->Pass_Space);
		// 先處理路徑，因為可能其他人需要Uri Token自己處理，而且就我流程，前面處理和Run時處理是一樣意思
		$route->Deal_Uri();
				
		$this->Route();
						
		// 跑Route
		$route->Run();
	}

	/*
	自訂路由
	*/
	public function Run_Custom()
	{
	}
	
	public function Route()
	{
		$route_ = \hahahalib\hahaha_route::Instance();

		// 註冊middleware，避免用到Middleware時不會跑
		$route_->Middleware_Callback = [
			'Object' => $this,
			'Action' => 'Middleware',
		];

		// --------------------------------------------------------------------------
		// 覆蓋
		// --------------------------------------------------------------------------
		// 注意，這裡採覆蓋，不覆蓋時如果有相同Node則會用第一次的
		$route_->Overwrite = true;
		// 如果Overwrite設為false，要是後面有Group('/')重設callback，則不會覆蓋callback執行
		// 所以這裡可能要改成直接require，避免影響到後面Group('/') or Group('/api')
		// require hahaha_application::Instance()->Root_ . '/app/http/routes/web.php';
		// require hahaha_application::Instance()->Root_ . '/app/http/routes/api.php';
		// ----
		// web		
		$route_->Group(
			"/",
			[
				'prefix' => '',
				'middleware' => ['web'],				
				'namespace' => '\\hahaha\\controller',
				'node' => \hahahalib\hahaha_route::CONSTANT_ROOT,
			],
			function($route){		
				require hahaha_application::Instance()->Root_ . '/app/http/routes/web.php';
			}							
		);

		// api
		$route_->Group(
			"/api",
			[
				'prefix' => '',
				'middleware' => ['api'],
				'namespace' => '',
				'node' => \hahahalib\hahaha_route::CONSTANT_ROOT,
			],
			function($route){
				require hahaha_application::Instance()->Root_ . '/app/http/routes/api.php';				
			}				
		);
		
		// --------------------------------------------------------------------------
		// 不覆蓋
		// --------------------------------------------------------------------------
		/*
		$route_->Overwrite = false;
		require hahaha_application::Instance()->Root_ . '/app/http/routes/web.php';
		require hahaha_application::Instance()->Root_ . '/app/http/routes/api.php';
		*/
	
	}

	/*
	Callback \hahahalib\hahaha_route Run要呼叫
	*/
	public function Middleware(&$middlewares)
	{
		$middleware_ = \hahaha\hahaha_middleware::Instance()->Initial();

		foreach($middlewares as &$middleware)
		{
			$m_ = $middleware_->Middleware($middleware)->Instance()->Initial();
			$m_->Handle();
		}
	}
	
}
