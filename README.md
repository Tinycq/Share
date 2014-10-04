#Share!
---

##Share!：手机浏览器访问电脑资源（图片视频）

- 手头有一些资源不好意思光明正大地看？没问题。。
- 手机流量不够用？资源都在硬盘里？没问题。。
- Share！解决你的问题。。

----
- Share! 可通过局域网分享电脑中的图片和视频资源，并且不占用手机内存空间，访问时只需开启几个web服务即可。

- Share! 可以识别 source 文件夹下的图片和视频资源，并且在网页中生成展示，视频可以在支持html5的手机浏览器中播放，看资源什么的完全不用担心。

##使用方法

1.windows用户可以安装Wampsever （mac用户考虑mamp之类的服务器环境一键安装包)，按照提示设置好安装路径。
2.将源代码下载后复制到wamp/www/目录下，访问http://127.0.0.1 可以打开wamp环境并且有share链接则恭喜你，基本安装已经完成。

-----
###以下步骤针对笔记本（学生党）用户
3.安装wifi共享精灵，共享后取得笔记本电脑的ip地址（192.168..开头，获取方式：win+R => cmd 输入 ipconfig 找到相应ip地址即可）

4.**很重要：将wampsever切换为在线状态，点击右下角绿色w图标切换（启动wamp服务之后）**

5.**很重要：修改 \wamp\bin\apache\Apache2.4.4\conf\httpd.conf文件**

	在大概266 行左右：
    #   onlineoffline tag - don't remove
     Order Deny,Allow
    ** Deny from all **
     Allow from 127.0.0.1
     Allow from ::1
     Allow from localhost
    </Directory>
	将deny from all 改为 allow form all
重启wamp服务

6.用在同一局域网中的手机访问该电脑ip地址，点击share（或直接访问：http://192.168.*.*/share/<*换成你自己的>）

**如果能打开,恭喜你已经成功啦！**

7.最后把你的秘密资源都复制到wamp/www/share/source文件夹中

###祝你好运！
