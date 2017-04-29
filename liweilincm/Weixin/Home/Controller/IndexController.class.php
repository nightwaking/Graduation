<?php
namespace Home\Controller;

use Home\Controller\WechatController;

class IndexController extends WechatController
{
	public function index()
	{
		define("TOKEN", "cuimeng1");
		$wechatobj = new WechatController();
		$wechatobj->valid();
		$wechatobj->definedItem();
	}
}
