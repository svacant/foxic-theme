<?php
include "data.php";
include "functions.php";

$clear_title = $_GET['clear_title'];
$file = "./page/" . $clear_title . ".html";

$page = new stdClass();

if (file_exists($file)) {
    $fileContent = file_get_contents($file);

    $pageVars = config_page($fileContent);

    $page->title = $pageVars['title'] ?? '';
    $page->keywords = $pageVars['keywords'] ?? '';
    $login = $pageVars['login'] ?? '';
    $page->content = $fileContent;

    if ($login === 'required') {
        if (!$_SESSION['uid']) {
            header("Location: /");
        }
    }
}else{

	$cachefile = $_SERVER['SERVER_NAME'].$clear_title;

	if(!$page= $mem_var->get($cachefile)){
		$page = $data->request("https://www.shoppiapp.com/api/website/section/json?clear_title=".$clear_title);


		if(!$page->title){
			Header("Location: /");
		}else{
			$mem_var->set($clear_title, $page);
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="<?=$page->description;?>">
        <meta name="keywords" content="<?=$page->keywords;?>">
        <meta name="author" content="">
        <title><? echo $page->title; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <!-- Vendor CSS -->
        <link href="css/vendor/bootstrap.min.css" rel="stylesheet">
        <link href="css/vendor/vendor.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <!-- Custom font -->
        <link href="fonts/icomoon/icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,[email protected],300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,[email protected],300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet"/>

    </head>
    <body class="has-smround-btns has-loader-bg equal-height">
    	<style>
    		.top_custom_nav {
    			color: #fff !important;
    			font-size: 13px !important;
    		}
    		.top_custom_nav {
    			text-decoration: none !important;
    		}
    		.mmenu > li > a {
    			font-size: 14px !important;
			    padding-right: 5px !important;
			    padding-left: 5px !important;
    		}
    	</style>
 		<? include "header.php"; ?>
 		
 		   	
         <div class="page-content">

		<div class="container">
		<?php
		echo $page->content;
		?>
		</div>
</div>
<? include"footer.php"; ?>
