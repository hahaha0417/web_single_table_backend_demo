<?php

namespace ha;

/*
快捷Route
*/
class Route
{
	use \hahahalib\hahaha_class_instance_handle_trait_http;

	public static $Class_Name_ = '\\hahahalib\\hahaha_route';

	// --------------------------------------------------------------------------
	// Property
	// --------------------------------------------------------------------------
	
	// --------------------------------------------------------------------------
	// 主要
	// --------------------------------------------------------------------------
	/*
	Group
	*/
	public static function Group($url, $parameter, $callback)
	{
		$route_ = self::Get_Http();

		$route_->Group($url, $parameter, $callback);
		return $route_;
	}

	/*
	Get
	*/
	public static function Get($url)
	{
		$route_ = self::Get_Http();

		$route_->Get($url);
		return $route_;
	}
		
	/*
	Put
	*/
	public static function Put($url)
	{
		$route_ = self::Get_Http();

		$route_->Put($url);
		return $route_;
	}
		
	/*
	Delete
	*/
	public static function Delete($url)
	{
		$route_ = self::Get_Http();

		$route_->Delete($url);
		return $route_;
	}
		
	/*
	Patch
	*/
	public static function Patch($url)
	{
		$route_ = self::Get_Http();

		$route_->Patch($url);
		return $route_;
	}

	// --------------------------------------------------------------------------
	// 功能
	// --------------------------------------------------------------------------
	public static function Redirect($url)
	{
		$route_ = self::Get_Http();

		$route_->Redirect($url);
		return $route_;
	}

}