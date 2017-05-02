# WXMDL
WXMDL (WeChat Multi-Domain Login / 微信多域名登录)

微信登录只能设置一个回调域名，而且调用连接的域名必须完全匹配。
这个插件可以修正多域名调用的问题，目前是专门针对插件 Open Social 做的，理论是支持所有类似需求的。

使用说明：

1、假设：微信授权域名为 wx.abc.com，需使用登录网站为 http://www.abc.com

2、上传本插件至微信授权域名的根目录，路径如：http://wx.abc.com/wxmdl.php

3、则网站回调地址设置为：http://wx.abc.com/wxmdl.php?cburl=http://www.abc.com



更多：https://www.xiaomac.com/2017042009.html
