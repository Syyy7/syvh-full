<?php

$server_ip="";
$result = shell_exec("ipconfig");
if(preg_match("/(IPv4)(\s*)(\S*)(\s*)(\S\s)*(\d+.\d+.\d+.\d+)/", $result, $match) !== 0){
    foreach($match as $value){
        if(preg_match("(\d+.\d+.\d+.\d+)",$value ,$ip_match)!= 0)
            $server_ip = $value;
    }
    unset($value);
}

if (isset($_GET['href'])){
    switch ($_GET['href']){
        case 'dvwa':
            header("Location: http://$server_ip:8081/dvwa-master");
            break;

        case 'sqli':
            header("Location: http://$server_ip:8181/sqli-labs-master");
            break;
            }

}