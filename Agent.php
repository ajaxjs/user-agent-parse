<?php
/********
 * User Agent Parse
***/

class Agent {
	public $match = [];
	public $lenth = [];
	public function __construct($ua=''){
		$ua = $ua?:$_SERVER['HTTP_USER_AGENT'];
		$match = [
            // 内核
            'core'	=> [
				'Trident' => strrpos($ua,'Trident') > -1 || strrpos($ua,'NET CLR') > -1,
				'Presto' => strrpos($ua,'Presto') > -1,
				'WebKit' => strrpos($ua,'AppleWebKit') > -1,
				'Gecko' => strrpos($ua,'Gecko/') > -1,
				'KHTML' => strrpos($ua,'KHTML/') > -1,
			],
            // 浏览器
            'browser'	=> [
				'Safari' => strrpos($ua,'Safari') > -1,
				'Chrome' => strrpos($ua,'Chrome') > -1 || strrpos($ua,'CriOS') > -1,
				'IE' => strrpos($ua,'MSIE') > -1 || strrpos($ua,'Trident') > -1,
				'Edge' => strrpos($ua,'Edge') > -1||strrpos($ua,'Edg/') > -1,
				'Firefox' => strrpos($ua,'Firefox') > -1 || strrpos($ua,'FxiOS') > -1,
				'Firefox Focus' => strrpos($ua,'Focus') > -1,
				'Chromium' => strrpos($ua,'Chromium') > -1,
				'Opera' => strrpos($ua,'Opera') > -1 || strrpos($ua,'OPR') > -1,
				'Vivaldi' => strrpos($ua,'Vivaldi') > -1,
				'Yandex' => strrpos($ua,'YaBrowser') > -1,
				'Arora' => strrpos($ua,'Arora') > -1,
				'Lunascape' => strrpos($ua,'Lunascape') > -1,
				'QupZilla' => strrpos($ua,'QupZilla') > -1,
				'Coc Coc' => strrpos($ua,'coc_coc_browser') > -1,
				'Kindle' => strrpos($ua,'Kindle') > -1 || strrpos($ua,'Silk/') > -1,
				'Iceweasel' => strrpos($ua,'Iceweasel') > -1,
				'Konqueror' => strrpos($ua,'Konqueror') > -1,
				'Iceape' => strrpos($ua,'Iceape') > -1,
				'SeaMonkey' => strrpos($ua,'SeaMonkey') > -1,
				'Epiphany' => strrpos($ua,'Epiphany') > -1,
				'360' => strrpos($ua,'QihooBrowser') > -1||strrpos($ua,'QHBrowser') > -1,
				'360EE' => strrpos($ua,'360EE') > -1,
				'360SE' => strrpos($ua,'360SE') > -1,
				'UC' => strrpos($ua,'UCBrowser') > -1 || strrpos($ua,' UBrowser') > -1,
				'QQBrowser' => strrpos($ua,'QQBrowser') > -1,
				'QQ' => strrpos($ua,'QQ/') > -1,
				'Baidu' => strrpos($ua,'Baidu') > -1 || strrpos($ua,'BIDUBrowser') > -1|| strrpos($ua,'baiduboxapp') > -1,
				'Maxthon' => strrpos($ua,'Maxthon') > -1,
				'Sogou' => strrpos($ua,'MetaSr') > -1 || strrpos($ua,'Sogou') > -1,
				'Liebao' => strrpos($ua,'LBBROWSER') > -1|| strrpos($ua,'LieBaoFast') > -1,
				'2345Explorer' => strrpos($ua,'2345Explorer') > -1||strrpos($ua,'Mb2345Browser') > -1,
				'115Browser' => strrpos($ua,'115Browser') > -1,
				'TheWorld' => strrpos($ua,'TheWorld') > -1,
				'XiaoMi' => strrpos($ua,'MiuiBrowser') > -1,
				'Quark' => strrpos($ua,'Quark') > -1,
				'Qiyu' => strrpos($ua,'Qiyu') > -1,
				'Wechat' => strrpos($ua,'MicroMessenger') > -1,
				'WechatWork' => strrpos($ua,'wxwork/') > -1,
				'Taobao' => strrpos($ua,'AliApp(TB') > -1,
				'Alipay' => strrpos($ua,'AliApp(AP') > -1,
				'Weibo' => strrpos($ua,'Weibo') > -1,
				'Douban' => strrpos($ua,'com.douban.frodo') > -1,
				'Suning' => strrpos($ua,'SNEBUY-APP') > -1,
				'iQiYi' => strrpos($ua,'IqiyiApp') > -1,
				'DingTalk' => strrpos($ua,'DingTalk') > -1,
				'Huawei' => strrpos($ua,'HuaweiBrowser') > -1||strrpos($ua,'HUAWEI/') > -1,
				'Vivo' => strrpos($ua,'VivoBrowser') > -1,
			],
            // 系统或平台
            'platform'	=> [
				'Windows' => strrpos($ua,'Windows') > -1,
				'Linux' => strrpos($ua,'Linux') > -1 || strrpos($ua,'X11') > -1,
				'Mac OS' => strrpos($ua,'Macintosh') > -1,
				'Android' => strrpos($ua,'Android') > -1 || strrpos($ua,'Adr') > -1,
				'Ubuntu' => strrpos($ua,'Ubuntu') > -1,
				'FreeBSD' => strrpos($ua,'FreeBSD') > -1,
				'Debian' => strrpos($ua,'Debian') > -1,
				'Windows Phone' => strrpos($ua,'IEMobile') > -1 || strrpos($ua,'Windows Phone')>-1,
				'BlackBerry' => strrpos($ua,'BlackBerry') > -1 || strrpos($ua,'RIM') > -1,
				'MeeGo' => strrpos($ua,'MeeGo') > -1,
				'Symbian' => strrpos($ua,'Symbian') > -1,
				'iOS' => strrpos($ua,'like Mac OS X') > -1,
				'Chrome OS' => strrpos($ua,'CrOS') > -1,
				'WebOS' => strrpos($ua,'hpwOS') > -1,
			],
	        // 设备
			'device'	=> [
				'PC'	=> strrpos($ua,'Windows NT') > -1,
				'Mobile' => strrpos($ua,'Mobi') > -1 || strrpos($ua,'iPh') > -1 || strrpos($ua,'480') > -1,
				'Tablet' => strrpos($ua,'Tablet') > -1 || strrpos($ua,'Pad') > -1 || strrpos($ua,'Nexus 7') > -1
			]
		];
		foreach ($match as $ti => $mode) {
			foreach ($mode as $vi => $vo) {
				if($vo){
					if(!isset($this->match[$ti])){
						$this->match[$ti] = [];
					}
					$this->match[$ti][] = $vi;
				}
			}
			$this->lenth[$ti] = count($this->match[$ti]);
		}
	}
	public function platform(){
		$platform = $this->match['platform'];
		$len = $this->lenth['platform'];
		return $len ? $platform[$len-1] : 'Unknow';
	}
	public function browser(){
		$broArr = [
			"Chrome" => "谷歌浏览器",
			"Chromium" => "谷歌浏览器开源版",
			"IE" => "微软IE浏览器",
			"Edge" => "微软新一代浏览器",
			"Firefox" => "火狐浏览器",
			"Safari" => "苹果Safari浏览器",
			"Opera" => "Opera浏览器",
			"Vivaldi" => "Opera联合创始人发布",
			"Yandex" => "俄罗斯Yandex",
			"Arora" => "Arora浏览器",
			"Lunascape" => "日本Lunascape",
			"QupZilla" => "QupZilla跨平台浏览器",
			"Coc Coc" => "越南搜索引擎浏览器",
			"Kindle" => "亚马逊电子书",
			"Iceweasel" => "Firefox的Debian版",
			"Konqueror" => "征服者浏览器",
			"Iceape" => "Iceape",
			"SeaMonkey" => "SeaMonkey",
			"Epiphany" => "Epiphany",
			"360" => "360浏览器(手机版)",
			"360SE" => "360安全浏览器",
			"360EE" => "360极速浏览器",
			"UC" => "UC浏览器",
			"QQBrowser" => "QQ浏览器",
			"QQ" => "QQ客户端",
			"Baidu" => "百度浏览器",
			"Maxthon" => "傲游浏览器",
			"Sogou" => "搜狗浏览器",
			"Liebao" => "猎豹浏览器",
			"2345Explorer" => "2345浏览器",
			"115Browser" => "115浏览器",
			"TheWorld" => "世界之窗浏览器",
			"Qiyu" => "旗鱼浏览器",
			"XiaoMi" => "小米浏览器",
			"Huawei" => "华为浏览器",
			"Vivo" => "Vivo浏览器",
			"Quark" => "夸克浏览器",
			"Wechat" => "微信手机客户端",
			"WechatWork" => "企业微信客户端",
			"Taobao" => "淘宝手机客户端",
			"Alipay" => "支付宝手机客户端",
			"Weibo" => "微博手机客户端",
			"Douban" => "豆瓣手机客户端",
			"Suning" => "苏宁易购手机客户端",
			"iQiYi" => "爱奇艺手机客户端",
			"DingTalk" => "钉钉手机客户端"
		];
		$browser = $this->match['browser'];
		$len = count($browser);
		$broType = $len ? $browser[$len-1] : 'Unknow';
		$borName = isset($broArr[$broType]) ? $broArr[$broType] : '未知浏览器';
		return [$broType,$borName];
	}
	public function device(){
		$device = $this->match['device'];
		$len = count($device);
		return $len ? $device[$len-1] : 'Unknow';
	}
}
