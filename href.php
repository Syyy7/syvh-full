<?php
//以下的功能是获取本机ip 方便后续的地址跳转
$server_ip="";
$result = shell_exec("ipconfig");
if(preg_match("/(IPv4)(\s*)(\S*)(\s*)(\S\s)*(\d+.\d+.\d+.\d+)/", $result, $match) !== 0){
    foreach($match as $value){
        if(preg_match("(\d+.\d+.\d+.\d+)",$value ,$ip_match)!= 0)
            $server_ip = $value;
    }
    unset($value);
}
//php不同版本的端口号，切记站点目录一定是同一个
$phpV5Port="8181";
$phpV7Port="8081";

if (isset($_GET['href'])){
    switch ($_GET['href']){
            case 'dvwa':
                header("Location: http://$server_ip:$phpV7Port/dvwa-master");
                break;

            case 'dvwa-cn':
                header("Location: http://$server_ip:$phpV7Port/DVWA-Chinese-main");
                break;

            case 'sqli':
                header("Location: http://$server_ip:$phpV5Port/sqli-labs-master");
                break;

            case 'pikachu':
                header("Location: http://$server_ip:$phpV7Port/pikachu-master");
                break;

            case 'upload':
                header("Location: http://$server_ip:$phpV5Port/upload-labs-master");
                break;

            case 'xss':
                header("Location: http://$server_ip:$phpV5Port/xss-labs-main");
                break;

            }

}