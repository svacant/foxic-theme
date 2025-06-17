<?
include "data.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><? echo $data->title; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <!-- Vendor CSS -->
        <link href="css/vendor/bootstrap.min.css" rel="stylesheet">
        <link href="css/vendor/vendor.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/search.css" rel="stylesheet">
        <!-- Custom font -->
        <link href="fonts/icomoon/icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
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
    	
<? include "header.php"; ?>

        <div class="page-content">
            <!-- Main Slider -->
            <div class="holder fullwidth full-nopad mt-0">
                <div class="container">
                    <div class="bnslider-wrapper">
                        <div class="bnslider bnslider--lg keep-scale" id="bnslider-001" data-slick='{"arrows": true, "dots": true}' data-autoplay="true" data-speed="5000" data-start-width="1917" data-start-height="764" data-start-mwidth="1550" data-start-mheight="1000">
                          
                        <?php
						$path    = './fotos/slider/';
						$files = scandir($path);
						$files = array_diff(scandir($path), array('.', '..'));
						
						foreach($files as $file){
						?>
                          
                            <div class="bnslider-slide">
                                <div class="bnslider-image-mobile lazyload" data-bgset="/fotos/slider/<?=$file;?>"></div>
                                <div class="bnslider-image lazyload" data-bgset="/fotos/slider/<?=$file;?>"></div>
                                <div class="bnslider-text-wrap bnslider-overlay ">
                                    <div class="bnslider-text-content txt-middle txt-right txt-middle-m txt-center-m">
                                        <div class="bnslider-text-content-flex ">
                                            <div class="bnslider-vert w-s-60 w-ms-100" style="padding: 0px">
                                                <!-- <div class="bnslider-text order-1 mt-sm bnslider-text--md text-center data-ini" data-animation="fadeInUp" data-animation-delay="800" data-fontcolor="#282828" data-fontweight="700" data-fontline="1.5">Best Price This Year</div>
                                                <div class="bnslider-text order-2 mt-sm bnslider-text--xs text-center data-ini" data-animation="fadeInUp" data-animation-delay="1000" data-fontcolor="#7c7c7c" data-fontweight="400" data-fontline="1.5">eCommerce HTML Template</div>
                                                <div class="btn-wrap text-center  order-4 mt-md" data-animation="fadeIn" data-animation-delay="2000" style="opacity: 1;">
                                                    <a href="https://bit.ly/3eJX5XE" target="_blank" class="btn">
                                                    Shop now
                                                    </a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						<? } ?>
                        </div>
                        <div class="bnslider-arrows container-fluid">
                            <div></div>
                        </div>
                        <div class="bnslider-dots container-fluid"></div>
                    </div>
                </div>
            </div>
            <!-- //Main Slider -->
            <!-- <div class="holder holder-mt-xsmall">
                <div class="container">
                    <div class="row vert-margin-small">
                        <div class="col-sm">
                            <a href="category.html" class="collection-grid-3-item image-hover-scale">
                                <div class="collection-grid-3-item-img image-container" style="padding-bottom: 93.68%">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/banner-fashion-2-02.png" class="lazyload fade-up" alt="Banner">
                                    <div class="foxic-loader"></div>
                                </div>
                                <div class="collection-grid-3-caption-bg">
                                    <h3 class="collection-grid-3-title">Accessories</h3>
                                    <h4 class="collection-grid-3-subtitle">The&nbsp;Best&nbsp;Look&nbsp;Anywhere</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm">
                            <a href="category.html" class="collection-grid-3-item image-hover-scale">
                                <div class="collection-grid-3-item-img image-container" style="padding-bottom: 93.68%">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/banner-fashion-2-04.png" class="lazyload fade-up" alt="Banner">
                                    <div class="foxic-loader"></div>
                                </div>
                                <div class="collection-grid-3-caption-bg">
                                    <h3 class="collection-grid-3-title">Fashion</h3>
                                    <h4 class="collection-grid-3-subtitle">Live&nbsp;According&nbsp;to&nbsp;Fashion</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="holder holder-mt-medium">
                <div class="container">
                    <ul class="brand-grid flex-wrap justify-content- js-color-hover-brand-grid">
                        <li>
                            <a href="#" target="_self" class="d-block image-container" title="Brand">
                            <img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/brands/brand-fashion-06.png" alt="Brand">
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_self" class="d-block image-container" title="Brand">
                            <img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/brands/brand-fashion-05.png" alt="Brand">
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_self" class="d-block image-container" title="Brand">
                            <img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/brands/brand-fashion-01.png" alt="Brand">
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_self" class="d-block image-container" title="Brand">
                            <img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/brands/brand-fashion-02.png" alt="Brand">
                            </a>
                        </li>
                        <li class="visuallyhidden js-hidden">
                            <a href="#" target="_self" class="d-block image-container" title="Brand">
                            <img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/brands/brand-fashion-03.png" alt="Brand">
                            </a>
                        </li>
                        <li class="visuallyhidden js-hidden">
                            <a href="#" target="_self" class="d-block image-container" title="Brand">
                            <img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/brands/brand-fashion-04.png" alt="Brand">
                            </a>
                        </li>
                    </ul>
                    <div class="text-center mt-3 d-md-none">
                        <a href="#" class="btn btn--grey brands-show-more js-brands-show-more"><span>Show More</span><span>Show Less</span></a>
                    </div>
                </div>
            </div> -->
            <div class="holder holder-mt-medium section-name-products-grid" id="productsGrid01">
                <div class="container">
                    <div class="title-wrap text-center">
                        <h2 class="h1-style">Sonderangebote</h2>
                        <!-- <div class="title-wrap title-tabs-wrap text-center js-title-tabs">
                            <div class="title-tabs">
                                <h2 class="h3-style">
                                    <a href="ajax/ajax-product-tab-01.json" data-total="8" data-loaded="4" data-grid-tab-title><span class="title-tabs-text theme-font">Women</span></a>
                                </h2>
                                <h2 class="h3-style">
                                    <a href="ajax/ajax-product-tab-02.json" data-total="8" data-loaded="4" data-grid-tab-title><span class="title-tabs-text theme-font">Men</span></a>
                                </h2>
                                <h2 class="h3-style">
                                    <a href="ajax/ajax-product-tab-03.json" data-total="8" data-loaded="4" data-grid-tab-title><span class="title-tabs-text theme-font">Accessories</span></a>
                                </h2>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="prd-grid-wrap">
                        <div class="prd-grid data-to-show-4 data-to-show-md-3 data-to-show-sm-2 data-to-show-xs-2" data-grid-tab-content></div>
                        <div class="loader-horizontal-sm js-loader-horizontal-sm d-none" data-loader-horizontal style="opacity: 0;"><span></span></div>
                    </div> -->
                </div>
            </div>
            <div class="holder holder-mt-medium ">
                <div class="container">
                    <a href="#" target="_blank" class="bnr-wrap bnr-">
                        <div class="bnr custom-caption image-hover-scale bnr--middle bnr--right bnr--fullwidth">
                            <div class="bnr-img d-none d-sm-block image-container" style="padding-bottom: 41.36752136752137%">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?=$data->cover;?>" class="lazyload fade-up" alt="">
                            </div>
                            <div class="bnr-img d-sm-none image-container" style="padding-bottom: 74.3139407244786%">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/banner-fashion2-full-m.png" class="lazyload fade-up" alt="">
                            </div>
                            <!-- <div class="bnr-caption text-center" style="padding: 4% 4%; ">
                                <div class="bnr-caption-inside w-s-50 w-ms-100 title-wrap">
                                    <h2 class="h1-style">The best trends<br class="d-sm-none"> of summer 2020</h2>
                                    <div class="h-sub mt-0">eCommerce HTML Template</div>
                                    <div class="bnr-btn inherit mt-sm order-3">
                                        <div class="btn">Buy Now</div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </a>
                </div>
            </div>
            <div class="holder">
                <div class="container">
                    <div class="title-wrap text-center">
                        <h2 class="h1-style">Best Seller</h2>
                    </div>
                    <div class="prd-grid-wrap position-relative">
                        <div id="products-best-sellers" class="prd-grid data-to-show-4 data-to-show-lg-4 data-to-show-md-3 data-to-show-sm-2 data-to-show-xs-2 js-category-grid" data-grid-tab-content>
                        </div>
                    </div>
                </div>
            </div>

            <div class="holder">
                <div class="container">
                    <div class="title-wrap text-center">
                        <h2 class="h1-style">New Arrivals</h2>
                    </div>
                    <div class="prd-grid-wrap position-relative">
                        <div id="products-new-arrivals" class="prd-grid data-to-show-4 data-to-show-lg-4 data-to-show-md-3 data-to-show-sm-2 data-to-show-xs-2 js-category-grid" data-grid-tab-content>
						</div>
                    </div>
                </div>
            </div>

            <div class="holder holder-mt-medium">
				<div class="container">
					<div class="title-wrap text-left">
						<h2 class="h2-style">Unsere Marken</h2>
					</div>
					<ul class="brand-carousel js-brand-carousel slick-arrows-aside-simple" data-slick='{"height": 20, "slidesToShow": 7,  "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 4 }},{"breakpoint": 480,"settings": {"slidesToShow": 2 }}]}'>
						<?php
						$path    = './fotos/marken/';
						$files = scandir($path);
						$files = array_diff(scandir($path), array('.', '..'));
						
						foreach($files as $file){
						?>
						<li>
							<div>
								<img class="lazyload lazypreload" data-src="/fotos/marken/<?=$file;?>" data-sizes="auto" alt="Brand">
							</div>
						</li>
						<? } ?>
					</ul>
				</div>
			</div>

        </div>
<? include"footer.php"; ?>

		<script id="list-new-products" type="text/x-handlebars-template">
				<div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w">
					<div class="prd-inside">
						<div class="prd-img-area">
							<a href="{{link}}" class="prd-img image-hover-scale image-container">
								<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{photo}}" alt="Oversized Cotton Blouse" class="js-prd-img lazyload fade-up">
								<div class="prd-big-squared-labels">
									<div class="label-new"><span>New</span></div>
								</div>
							</a>
						</div>
						<div class="prd-info">
							<div class="prd-info-wrap">
							<div class="prd-tag">{{category}}</div>
							<h2 class="prd-title"><a href="{{link}}">{{title}}</a></h2>
							<div class="prd-tag">{{text}}</div>
								<div class="prd-action">
									<a class="btn btn-primary" href="{{link}}">Shop Now</a>
								</div>
							</div>
							<div class="prd-hovers">
								<div class="prd-price">

									<div class="price-new">{{price}}</div>
								</div>
								<div class="prd-action">
									<div class="prd-action-left">
										<a class="btn btn-primary" href="{{link}}">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</script>

		<script id="list-products" type="text/x-handlebars-template">
				<div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w">
				<div class="prd-inside">
					<div class="prd-img-area">
						<a href="{{link}}" class="prd-img image-hover-scale image-container">
							<img src="{{photo}}" alt="Oversized Cotton Blouse" class="js-prd-img lazyload fade-up">
							<div class="prd-big-squared-labels">
								<div class="label-new"><span>Best Seller</span></div>
							</div>
						</a>
					</div>
					<div class="prd-info">
						<div class="prd-info-wrap">
							<div class="prd-tag">{{category}}</div>
							<h2 class="prd-title"><a href="{{link}}">{{title}}</a></h2>
							<div class="prd-tag">{{text}}</div>
							<div class="prd-action">
								<a class="btn btn-primary" href="{{link}}">Shop Now</a>
							</div>
						</div>
						<div class="prd-hovers">
							<div class="prd-price">
							
								<div class="price-new">{{price}}</div>
							</div>
							<div class="prd-action">
								<div class="prd-action-left">
									<a class="btn btn-primary" href="{{link}}">Shop Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
         </script>
        <script src="/js/home.js"></script>
    </body>
</html>
