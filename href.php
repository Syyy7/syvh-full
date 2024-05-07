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
            case 'cdb':
                $v5address = $server_ip.":".$phpV5Port;
                $v7address = $server_ip.":".$phpV7Port;
                toCreatDB($_GET['dbname'],$v5address,$v7address);
                break;

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

            case 'dedecms':
                header("Location: http://$server_ip:$phpV5Port/dedecms");
                break;


    }

}

function toCreatDB($dbname,$v5address,$v7address){
    switch ($dbname){
        case 'all':
            echo "<script>window.open('http://$v7address/dvwa-master/setup.php?cdb=1','_blank').location</script>";
            echo "<script>window.open('http://$v7address/dvwa-Chinese-main/setup.php?cdb=1','_blank').location</script>";
            echo "<script>window.open('http://$v7address/pikachu-master/install.php?cdb=1','_blank').location</script>";
            echo "<script>window.open('http://$v5address/sqli-labs-master/sql-connections/setup-db.php','_blank').location</script>";
            echo "<script>window.close()</script>";


        case 'sqli':
            echo "<script>window.open('http://$v5address/sqli-labs-master/sql-connections/setup-db.php','_blank').location</script>";
            echo "<script>window.close()</script>";
            break;

        case 'dvwa':
            echo "<script>window.open('http://$v7address/dvwa-master/setup.php?cdb=1','_blank').location</script>";
            echo "<script>window.close()</script>";
            break;

        case 'dvwa-cn':
            echo "<script>window.open('http://$v7address/DVWA-Chinese-main/setup.php?cdb=1','_blank').location</script>";
            echo "<script>window.close()</script>";
            break;

        case 'pikachu':
            echo "<script>window.open('http://$v7address/pikachu-master/install.php?cdb=1','_blank').location</script>";
            echo "<script>window.close()</script>";
            break;
    }
}