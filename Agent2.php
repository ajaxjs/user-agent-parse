<?php
/********
 * User Agent Parse
 * 继承 Jenssegers\Agent\Agent
***/
use Jenssegers\Agent\Agent as AgentMod;

class Agent extends AgentMod {
	// My Browser
	public function browser($userAgent = null){
		$match = [
            // 浏览器
            'regexp'	=> [
				'Safari' => 'Safari',
				'Chrome' => 'Chrome|CriOS',
				'IE' => 'MSIE|Trident',
				'Edge' => 'Edge|Edg\/',
				'Firefox' => 'Firefox|FxiOS',
				'Firefox Focus' => 'Focus',
				'Chromium' => 'Chromium',
				'Opera' => 'Opera|OPR',
				'Vivaldi' => 'Vivaldi',
				'Yandex' => 'YaBrowser',
				'Arora' => 'Arora',
				'Lunascape' => 'Lunascape',
				'QupZilla' => 'QupZilla',
				'Coc Coc' => 'coc_coc_browser',
				'Kindle' => 'Kindle|Silk\/',
				'Iceweasel' => 'Iceweasel',
				'Konqueror' => 'Konqueror',
				'Iceape' => 'Iceape',
				'SeaMonkey' => 'SeaMonkey',
				'Epiphany' => 'Epiphany',
				'360' => 'QihooBrowser|QHBrowser',
				'360EE' => '360EE',
				'360SE' => '360SE',
				'UC' => 'UCBrowser| UBrowser',
				'QQBrowser' => 'QQBrowser',
				'QQ' => 'QQ\/',
				'Baidu' => 'Baidu|BIDUBrowser|baiduboxapp',
				'Maxthon' => 'Maxthon',
				'Sogou' => 'MetaSr|Sogou',
				'Liebao' => 'LBBROWSER|LieBaoFast',
				'2345Explorer' => '2345Explorer|Mb2345Browser',
				'115Browser' => '115Browser',
				'TheWorld' => 'TheWorld',
				'XiaoMi' => 'MiuiBrowser',
				'Quark' => 'Quark',
				'Qiyu' => 'Qiyu',
				'Wechat' => 'MicroMessenger',
				'WechatWork' => 'wxwork\/',
				'Taobao' => 'AliApp\(T',
				'Alipay' => 'AliApp\(A',
				'Weibo' => 'Weibo',
				'Douban' => 'com.douban.frodo',
				'Suning' => 'SNEBUY-APP',
				'iQiYi' => 'IqiyiApp',
				'DingTalk' => 'DingTalk',
				'Huawei' => 'HuaweiBrowser|HUAWEI\/',
				'Vivo' => 'VivoBrowser',
			],
			// 浏览器名称
			'name'	=> [
				"Unknow"	=> "未知",
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
			]
		];
		$borName = 'Unknow';
		foreach ($match['regexp'] as $name => $vo) {
			if($this->match($vo)){
				$borName = $name;
			}
		}
		return [$borName, $match['name'][$borName]];
	}
}
