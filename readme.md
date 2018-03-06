laravel-5.2-blog
Blog system development based on laravel 5.2.*

Demo
演示地址：http://www.minhanyu.cn/

安装配置

1.克隆到你的服务器环境

git clone https://github.com/minbo91/my_blog.git 

2.切换到 my_blog 所在目录，使用composer 更新扩展包

如果没有安装过composer请先安装：

http://www.phpcomposer.com/

cd my_blog/

composer install

3.复制 .env.example 改名为 .env

4.修改数据库配置.env,在数据库中创建一个库,把配置信息填写到配置文件中

5.创建数据my_blog并导入数据库

my_blog根目录下的blog.sql 

后台登陆地址

http://localhost/my_blog/admin/index

账号 admin 密码 123456 
	
	
	

	