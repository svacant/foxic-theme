<?php
include "data.php";
include "functions.php";
$lang = $_SESSION['lang'];

$clear_title = $_GET['clear_title'];
$file = "./page/".$clear_title.".html";

if(file_exists($file)){
	$file = file_get_contents($file);

        $page_vars = config_page($file);
        $config = [];
        foreach (explode("\n", strip_tags($page_vars)) as $line) {
            if (preg_match('/\$(\w+)\s*=\s*(.*)/', trim($line), $m)) {
                $name = $m[1];
                $val = trim($m[2], "'\"; ");
                $config[$name] = $val;
            }
        }

        $page->title = $config['title'] ?? '';
        $page->keywords = $config['keywords'] ?? '';
        $page->content = $file;
        $login = $config['login'] ?? '';

        if($login == 'required'){
                if(!$_SESSION['uid']){ header("Location: /"); };
        }
}else{

	$cachefile = $_SERVER['SERVER_NAME'].$clear_title;

        if(!$page= $cache->get($cachefile)){
		$page = $data->request("https://www.shoppiapp.com/api/website/section/json?clear_title=".$clear_title);


		if(!$page->title){
			Header("Location: /");
		}else{
                        $cache->set($clear_title, $page);
		}
	}
}
?>
<!DOCTYPE html>
<html lang="<?=$lang?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="<?=$page->description;?>">
        <meta name="keywords" content="<?=$page->keywords;?>">
        <meta name="author" content="">
        <title><?php echo $page->title; ?></title>
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
    <body class="has-smround-btns has-loader-bg equal-height" data-pageid="<?php echo $shoppiPageId; ?>">
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
 		<?php include "header.php"; ?>
 		
 		   	
         <div class="page-content">

		<div class="container">
		<?php
		echo $page->content;
		?>
		</div>
</div>
<?php include"footer.php"; ?>
