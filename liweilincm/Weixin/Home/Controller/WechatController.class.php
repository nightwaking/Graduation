<?php
namespace Home\Controller;

use Think\Controller;

class WechatController extends Controller
{
	public function valid()
	{
		$echoStr = $_GET["echostr"];
		if($this->checkSignature() && $echoStr){
			echo $echoStr;
			exit;
		}else{
			$this->responseMsg();
		}
	}

	private function checkSignature()
	{
		if (!defined("TOKEN")) {
			throw new \Think\Exception('TOKEN is not defined!');
		}

		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

	//接收事件推送并回复
	public function responseMsg()
	{
		//1.获取到微信推送过来post数据（xml格式）
		$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
		//2.处理消息类型，并设置回复类型和内容
		/*<xml>
		<ToUserName><![CDATA[toUser]]></ToUserName>
		<FromUserName><![CDATA[FromUser]]></FromUserName>
		<CreateTime>123456789</CreateTime>
		<MsgType><![CDATA[event]]></MsgType>
		<Event><![CDATA[subscribe]]></Event>
		</xml>*/
		$postObj  = simplexml_load_string( $postArr );
		$toUser   = $postObj->ToUserName;
		//openId
		$fromUser = $postObj->FromUserName;
		$time     = time();
		//判断该数据包是否是订阅的事件推送
		if( strtolower($postObj->MsgType) == 'event'){
			//如果是关注 subscribe 事件
			if( strtolower($postObj->Event == 'subscribe') ){
				//回复用户消息(纯文本格式)	
				$msgType  =  'text';
				$content  = 'Hello My Family!';
				$template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							</xml>";
				$info     = sprintf($template, $fromUser, $toUser, $time, $msgType, $content);
				echo $info;
				/*<xml>
				<ToUserName><![CDATA[toUser]]></ToUserName>
				<FromUserName><![CDATA[fromUser]]></FromUserName>
				<CreateTime>12345678</CreateTime>
				<MsgType><![CDATA[text]]></MsgType>
				<Content><![CDATA[你好]]></Content>
				</xml>*/
			

			}
		}
		
// 		if(strtolower($postObj->MsgType) == 'text'){
// 			switch( trim($postObj->Content) ){
// 				case 1:
// 					$content = '您输入的数字是1';
// 				break;
// 				case 2:
// 					$content = '您输入的数字是2';
// 				break;
// 				case 3:
// 					$content = '您输入的数字是3';
// 				break;
// 				case 4:
// 					$content = '您输入的数字为4';
// 				break;
// 				case '英文':
// 					$content = 'hello';
// 				break;

// 			}	
// 				$template = "<xml>
// <ToUserName><![CDATA[%s]]></ToUserName>
// <FromUserName><![CDATA[%s]]></FromUserName>
// <CreateTime>%s</CreateTime>
// <MsgType><![CDATA[%s]]></MsgType>
// <Content><![CDATA[%s]]></Content>
// </xml>";
// //注意模板中的中括号 不能少 也不能多 
// 				$time     = time();
// 				// $content  = '18723180099';
// 				$msgType  = 'text';
// 				echo sprintf($template, $fromUser, $toUser, $time, $msgType, $content);
			
// 		}

		//用户发送tuwen1关键字的时候，回复一个单图文
		if( strtolower($postObj->MsgType) == 'text' && trim($postObj->Content)=='tuwen2' ){
			$arr = array(
				array(
					'title'=>'基于微信平台的商城',
					'description'=>"微信商城平台",
					'picUrl'=>'http://www.imooc.com/static/img/common/logo.png',
					'url'=>'http://www.liweilincm.xyz/app.php',
				),
				// array(
				// 	'title'=>'hao123',
				// 	'description'=>"hao123 is very cool",
				// 	'picUrl'=>'https://www.baidu.com/img/bdlogo.png',
				// 	'url'=>'http://www.hao123.com',
				// ),
				// array(
				// 	'title'=>'qq',
				// 	'description'=>"qq is very cool",
				// 	'picUrl'=>'http://www.imooc.com/static/img/common/logo.png',
				// 	'url'=>'http://www.qq.com',
				// ),
			);
			$template = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<ArticleCount>".count($arr)."</ArticleCount>
						<Articles>";
			foreach($arr as $k=>$v){
				$template .="<item>
							<Title><![CDATA[".$v['title']."]]></Title> 
							<Description><![CDATA[".$v['description']."]]></Description>
							<PicUrl><![CDATA[".$v['picUrl']."]]></PicUrl>
							<Url><![CDATA[".$v['url']."]]></Url>
							</item>";
			}
			
			$template .="</Articles>
						</xml> ";
			echo sprintf($template, $fromUser, $toUser, time(), 'news');

			//注意：进行多图文发送时，子图文个数不能超过10个
		}else{
			switch( trim($postObj->Content) ){
				case 1:
					$content = '您输入的数字是1';
				break;
				case 2:
					$content = '您输入的数字是2';
				break;
				case 3:
					$content = '您输入的数字是3';
				break;
				case 4:
					$content = "<a href='http://www.liweilincm.xyz/app.php'>微信商城</a>";
				break;
				case '英文':
					$content = 'Wechat is ok';
				break;
			}	
				$template = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
//注意模板中的中括号 不能少 也不能多
				$time     = time();
				// $content  = '18723180099';
				$msgType  = 'text';
				echo sprintf($template, $fromUser, $toUser, $time, $msgType, $content);
			
		}//if end
	}

	public function definedItem(){
		header('content-type:text/html;charset=utf8');
		
		$access_token = getWxAccessToken();

		$url =  "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
		$postArray = array(
			
			'button' => array(
				//一级菜单
				array(
					'name' => urlencode('商城'),
					'sub_button' => array(
						array(
							'name' => urlencode('商城'),
							'type' => 'view',
							'url'  => 'http://www.liweilincm.xyz/index.php/Home/Home/home',
						),
					),
				),

				array(
					'name' => urlencode('商城'),
					'sub_button' => array(
						array(
							'name' => urlencode('商城后台'),
							'type' => 'view',
							'url'  => 'http://www.liweilincm.xyz/app.php',
						),
					),
				),

			),
		);
		$postJson  = urldecode(json_encode( $postArray ));
		$res = curl_get($url, 'post', 'json', $postJson);
	}
}
