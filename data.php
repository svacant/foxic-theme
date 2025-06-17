<?php
//include "database.php";
session_start();

$lang = isset($_GET['lang']) ? $_GET['lang'] : ($_SESSION['lang'] ?? getenv('APP_LANG') ?: 'en');
$_SESSION['lang'] = $lang;

$mem_var = new Memcached();
$mem_var->addServer("127.0.0.1", 11211);

// Shoppi page identifier used for API requests. Change this value when testing
// different storefront configurations locally.
$shoppiPageId = 10587;

class data{

   var $title;
   var $logo;
   var $cover;
   var $email;
   var $lang;
   
   function set($name,$value){
	   
	   $this->$name = $value;
	   

   }
   
   function request($url){
        $lang = $this->lang;
	   
			$opts = array(
			  'http'=>array(
				'method'=>"GET",
                                'header'=>"Accept-language: " . $this->lang . "\r\n" .
						  "Cookie: foo=bar\r\n" . 
						 "Referer: https://".$_SERVER['SERVER_NAME']."\r\n"
			  )
			);

			$context = stream_context_create($opts);

	   
	   		$info = json_decode(file_get_contents($url, false, $context));
	   		
	   		return $info;
   }

    
     function __construct() {
         global $db, $mem_var;
         $this->lang = $_SESSION['lang'];

		
                        $prefix = md5($_SERVER["SERVER_NAME"]."_".$shoppiPageId); //based on host and pageId
			

			$opts = array(
			  'http'=>array(
				'method'=>"GET",
                                'header'=>"Accept-language: " . $this->lang . "\r\n" .
						  "Cookie: foo=bar\r\n" . 
						 "Referer: http://".$_SERVER['SERVER_NAME']."\r\n"
			  )
			);

			$context = stream_context_create($opts);

	
			$info = $mem_var->get($prefix);
			
			
                        if(!$info){
                                $info = $this->request("https://www.shoppiapp.com/api/website/info/json?pageId=".$shoppiPageId);

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
