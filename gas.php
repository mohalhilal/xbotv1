<?php

//Created by Wowokun
//Scam atau ngga bukan salah gw aw
//Mon maap sc na garapih, yg penting opittttt

session_start();

include 'bit.php';


$ptc = new ptc();


echo "\033[95m ###=== Script Version 2.3 ===###\n\n";

echo "\033[90m Contoh cookie:\033[93mPHPSESSID=a73018oz201567892018sa \n\n";
echo "\033[90m Masukan cookie mu:";
$cookie = trim(fgets(STDIN));
echo "\n";
echo "\033[90m Sleep setiap berapa detik :";
$sleep = trim(fgets(STDIN));
echo "\n";
echo "\033[90m Target Satoshi(contoh 10000):";
$target = trim(fgets(STDIN));
echo "\n";

$loop = $target/5;

echo "\033[95m Mengambil data Ads.... \n";

echo "Loop untuk ".$loop."x \n";

for($no=1 ; $no <= $loop; $no++){

echo "\033[93m Result:.. \n";
$res = $ptc->get($cookie);
	$x = strstr($res ,'You earned 5 satoshi');
	$y = strstr($res, 'Balance :');
	$y2 = substr($y, 0,24);
 $x2 = substr($x, 0,20);
 if($x2 == ''){
 
 echo "\033[91m".$no."|Gagal,Tunggu giliran berikutnya ya gan \n";
 
 }else{
 
 echo "\033[92m ".$no."| ".$x2."|".$y2."\n";
 
 }
 
 echo"\033[93m Sleep dulu.. ".$sleep." detik biar aman sob \n";
sleep($sleep);
 
 echo"Merefresh data Ads.. \n";


}

echo "\033[96m Alhamdulillah udah selesai sob. silahkan WD yaa ke websitenya \n";

 



?>
