<?php
require_once __DIR__ . '/config.php';
//include "database.php";
session_start();

require_once __DIR__ . '/app/core/Lang.php';

$lang = isset($_GET['lang']) ? $_GET['lang'] : ($_SESSION['lang'] ?? envVar('APP_LANG', 'en'));
$_SESSION['lang'] = $lang;

$translations = loadTranslations($lang);

$cache = getMemcacheClient();

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
        global $db, $cache;
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

	
                        $info = $cache->get($prefix);
			
			
                        if(!$info){
                                $info = $this->request("https://www.shoppiapp.com/api/website/info/json?pageId=".$shoppiPageId);

                                $cache->set($prefix, $info);
                        }
			
		
			$array = (array)$info->info;
			
                       foreach($array as $name=>$data){
                               $this->set($name, $data);
                       }


                }

        public function sections() {
            global $cache, $shoppiPageId;
            $key = 'sections_' . md5($_SERVER['SERVER_NAME'] . '_' . $shoppiPageId . '_' . $this->lang);
            $sections = $cache->get($key);
            if (!$sections) {
                $sections = $this->request('https://www.shoppiapp.com/api/website/sections/json?pageId=' . $shoppiPageId);
                if ($sections) {
                    $cache->set($key, $sections, 3600);
                }
            }

            return $sections ? (array)$sections->sections : [];
        }


     }




$data = new data();
?>
