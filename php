1.添加模块
    第一种方法：
        a.应用目录下的build.php中添加:
            'demo'     => [
            '__file__'   => ['common.php'],
            '__dir__'    => ['behavior', 'controller', 'model', 'view'],
            'controller' => ['Index', 'Test', 'UserType'],
            'model'      => ['User', 'UserType'],
            'view'       => ['index/index'],
        ],
        b.终端执行php think build --config build.php
    第二种方法：
        终端执行php think build --module 模块名称

2.阿里云服务器安装LNMP环境：
    https://help.aliyun.com/document_detail/97251.html?spm=a2c4g.11186623.6.1261.bb265c17UPAkRZ
3.服务器部署tp5项目：
    git或composer,
    nginx.conf中配置添加：
        server{
            location / { // …..省略部分代码
                if (!-e $request_filename) {
                rewrite  ^(.*)$  /index.php?s=/$1  last;
                break;
                    }
            }
        }
4.php连接mysql8.0时 报错：The server requested authentication method unknown to the client
    是加密方式的改变导致
        修改/usr/local/etc/my.cnf
        最下面新增代码：
            default_authentication_plugin= mysql_native_password
        重启mysql
5.php跨域设置：
    在入口文件最前面添加（一定要添加到最前面）：
        header('Access-Control-Allow-Origin: *');

        header('Access-Control-Allow-Credentials: true');

        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); //允许的请求类型

        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
