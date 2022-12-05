<?php
//include "database.php";
session_start();

$mem_var = new Memcached();
$mem_var->addServer("127.0.0.1", 11211);

class data{
    
   var $title;
   var $logo;
   var $cover;
   var $email;
   
   function set($name,$value){
	   
	   $this->$name = $value;
	

   }
   
   function request($url){
	   //this is useful to apply http referer file_get_contents

			$opts = array(
			  'http'=>array(
				'method'=>"GET",
				'header'=>"Accept-language: en\r\n" .
						  "Cookie: foo=bar\r\n" . 
						 "Referer: http://".$_SERVER['SERVER_NAME']."\r\n"
			  )
			);

			$context = stream_context_create($opts);

	   
	   		$info = json_decode(file_get_contents($url, false, $context));
	   		
	   		return $info;
   }

    
     function __construct() {
         global $db, $mem_var;
         
         //Initialize logo and title of the page
         
        /* 
        $sql = "SELECT * FROM data";
		$result = $db->query($sql);
		
		while($row = $result->fetch_assoc()) {
			$this->set($row['name'], $row['data']); //set data
		}
		*/
		
			$prefix = md5($_SERVER["HTTP_HOST"]); //based on host
			

			$opts = array(
			  'http'=>array(
				'method'=>"GET",
				'header'=>"Accept-language: en\r\n" .
						  "Cookie: foo=bar\r\n" . 
						 "Referer: http://".$_SERVER['SERVER_NAME']."\r\n"
			  )
			);

			$context = stream_context_create($opts);

	
			$info = $mem_var->get($prefix);
			
			
			if(!$info){
				$info = json_decode(file_get_contents("https://www.shoppiapp.com/api/website/info/json", false, $context));
				$mem_var->set($prefix, $info);
			}
			
		
			$array = (array)$info->info;
			
			foreach($array as $name=>$data){
				$this->set($name, $data);			
			}

        
		}
        
        
     }




$data = new data();
?>
