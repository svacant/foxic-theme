<?php
    function config_page($data) {


        //Get configuration
 
        $var=$data;
        $configs=preg_split("/<!--/",$var,2);
        $configs=preg_split("/-->/",$configs[1],2);

        $config=$configs[0];
        

   
        return $config;
    }
?>
