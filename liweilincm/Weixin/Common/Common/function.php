<?php

    function http_curl($url){
        //获取imooc
        //1.初始化curl
        $ch = curl_init();
        //2.设置curl的参数
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //3.采集
        $res = curl_exec($ch);
        //4.关闭
        curl_close($ch);
        if( curl_errno($ch) ){
            var_dump( curl_error($ch) );
        }
        $arr = json_decode($res, true);
        return $arr;
    }

    function getToken(){
        $appId = "wx414330f0a371639b";
        $appSecret = "60daeeb5aed32c1408c610d90985f96e";
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appId."&secret=".$appSecret;
        return $url;
    }

    function getWxAccessToken(){
        /**
        * Session 存放access_token 还可以使用mysql
        */
        if($_SESSION['access_token'] && $_SESSION['expire_time'] > time()){
            return $_SESSION['access_token'];
        }else{
            $url = getToken();
            $curl = http_curl($url);
            $access_token = $curl['access_token'];

            $_SESSION['access_token'] = $access_token;
            $_SESSION['expire_time'] = time() + 7000;

            return $access_token;
        }
    }

    function getServerIp(){
        $url = getToken();
        $curl = http_curl($url);
        $access_token = $curl['access_token'];
        $get_url = "https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=".$access_token;
        return $get_url;
    }


    /**
    *http_curl修改版  较完整
    */
    function curl_get($url, $type='get', $res='json', $arr=''){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($type == "post"){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
        }

        $output = curl_exec($ch);
        curl_close($ch);

        if ($res == "json"){
            if (curl_errno($ch)){
                return curl_errno($ch);
            }else{
                return json_decode($output, true);
            }
        }
    }
