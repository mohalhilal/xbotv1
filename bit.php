<?php


class ptc{
  
  function curls($host,$header,$method)
  	{
  		$ch = curl_init();
  		curl_setopt($ch, CURLOPT_URL, $host);
  	
  		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);	
  		curl_setopt($ch, CURLOPT_HEADER, true);
  
  		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		
  		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  	
  		
  		$req = curl_exec($ch);
  
  		return $req;
  		
  	}
  	
  	 function curl($host,$header,$body,$method)
  	{
  		$ch = curl_init();
  		curl_setopt($ch, CURLOPT_URL, $host);
  		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);	
  		curl_setopt($ch, CURLOPT_HEADER, true);
  		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		curl_setopt($ch, CURLOPT_POST, 1);
  		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

  		
  		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  		
  		
  		$req = curl_exec($ch);
  
  		return $req;
  		
  	}
  	
 
  	
  	function get($cookie){
  	
   $header = array("cookie:".$cookie);
 
  $data = [];
  	for($i=1; $i < 5; $i++){
  	 $response = $this->curls('https://bitflicker.tech/p'.$i.'.php',$header,'GET');
  	$x = strstr($response ,'img/01/');
 $x2 = substr($x, 7, 2);
    
    if($x2 == "45"){
    array_push($data, 1);
    }elseif($x2 == "99"){
    array_push($data, 7);
    }elseif($x2 == "88"){
    array_push($data, 6);
    }elseif($x2 == "55"){
    array_push($data, 0);
    }elseif($x2 == "77"){
    array_push($data, 5);
    }elseif($x2 == "66"){
    array_push($data, 3);
    }elseif($x2 == "60"){
    array_push($data, 9);
    }elseif($x2 == "64"){
    array_push($data, 2);
    }elseif($x2 == "87"){
    array_push($data, 8);
    }elseif($x2 == "34"){
    array_push($data, 4);
    }else{
    array_push($data, 99);
    }
  	  
  	 
  	}
  	
  	
  	 $response =	$this->send($cookie,$data[0],$data[1],$data[2],$data[3]);

    
  return $response;
  
  	
  	
 
  	
  	}



  function send($cookie,$ad1,$ad2,$ad3,$ad4)
  {
    $body = Array(
  'odgovor' => $ad1,
  'odgovor2' => $ad2,
  'odgovor3' => $ad3,
  'odgovor4' => $ad4
 );
    $header = array("cookie:".$cookie ,
"Content-Type:application/x-www-form-urlencoded");
    $response = $this->curl('https://bitflicker.tech/home.php',$header,$body,'POST');
    return $response;
    
  }
  
  
  
  
}
?>