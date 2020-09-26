<?php

namespace hahaha;

/*
應用程式，有要修改再打開註解
*/
class hahaha_monitor
{
	use hahaha_instance_trait;
	
	function __construct($root)
	{
		$this->Run_ = false;
	}
	
	/*
	開始			
	*/
	public function Begin()
	{
		$this->Start_ = microtime(true);
	}
	
	/*
	主要			
	*/
	public function Design()
	{
		
	}

	/*
	結束			
	*/
	public function End()
	{
		$this->End_ = microtime(true);
		// echo "流程大概時間 : " . ($this->End_ - $this->Start_) * 1000 . "ms";
		if($this->Run_)
		{
			\hahahalib\line\hahaha_linebot_reply_message::Instance()->Linebot_ = \hahahalib\line\hahaha_linebot::Instance();
			\hahahalib\line\hahaha_linebot_reply_message::Instance()->Text($this->Event_, "流程大概時間 : " . ($this->End_ - $this->Start_) * 1000 . "ms");
		}
	}

}


