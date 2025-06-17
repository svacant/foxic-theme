<?php
include "data.php";
$lang = $_SESSION['lang'];

$category = $_SERVER['QUERY_STRING'];

$p = preg_match_all('/\d+$/', $category, $array);

$id = $array[0][0];

if(!$id){
	echo "No id";
}


$category = $data->request("https://www.shoppiapp.com/api/website/category/json?id=" . $id);


?>
<html lang="<?=$lang?>">
<head>
	<meta charset="utf-8">
	<meta
			http-equiv="X-UA-Compatible"
			content="IE=edge"
	>
	<meta
			name="viewport"
			content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
	>
	<meta
			name="description"
			content="<?= $category->description; ?>"
	>
	<meta
			name="keywords"
			content="<?= $category->keywords; ?>"
	>
	<meta
			name="author"
			content=""
	>
	<meta
			property="og:title"
			content="<?php echo $category->title; ?>"
	/>
	<meta
			property="og:type"
			content="product"
	/>
	<meta
			property="og:image"
			content="<?php echo $product->photo; ?>"
	/>
	<title><?php echo $category->title; ?></title>
	<link
			rel="shortcut icon"
			type="image/x-icon"
			href="/images/favicon.ico"
	/>
	<!-- Vendor CSS -->
	<link
			href="/css/vendor/bootstrap.min.css"
			rel="stylesheet"
	>
	<link
			href="/css/vendor/vendor.min.css"
			rel="stylesheet"
	>
	<!-- Custom styles for this template -->
	<link
			href="/css/style.css"
			rel="stylesheet"
	>
	<link
			href="/css/search.css"
			rel="stylesheet"
	>
	<!-- Custom font -->
	<link
			href="/fonts/icomoon/icons.css"
			rel="stylesheet"
	>
	<link
			rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
	>
	<link
			href="https://fonts.googleapis.com/css2?family=Montserrat:ital,[email protected],300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
			rel="stylesheet"
	>
	<link
			href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,[email protected],300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
			rel="stylesheet"
	>
	<link
			href="/css/header.css"
			rel="stylesheet"
	>

</head>
<body class="template-collection has-smround-btns has-loader-bg equal-height has-sm-container">
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
	<div class="holder breadcrumbs-wrap mt-0">
		<div class="container">
			<ul class="breadcrumbs">
				<li>
					<a href="/">Home</a>
				</li>
				<li>
					<span><?=$category->title;?></span>
				</li>
			</ul>
		</div>
	</div>
<!--	<div class="holder holder-mt-medium">-->
<!--		<div class="container">-->
<!--			<div class="row vert-margin-small">-->
<!--				<div class="col-sm">-->
<!--					<a-->
<!--							href="category.html"-->
<!--							class="collection-grid-3-item image-hover-scale"-->
<!--					>-->
<!--						<div-->
<!--								class="collection-grid-3-item-img image-container"-->
<!--								style="padding-bottom: 68.22%"-->
<!--						>-->
<!--							<img-->
<!--									src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--									data-src="/images/skins/fashion/banner-category-01.png"-->
<!--									class="lazyload fade-up"-->
<!--									alt="Banner"-->
<!--							>-->
<!--							<div class="foxic-loader"></div>-->
<!--						</div>-->
<!--						<div class="collection-grid-3-caption-bg">-->
<!--							<h3 class="collection-grid-3-title">Top</h3>-->
<!--							<h4 class="collection-grid-3-subtitle">The&nbsp;Best&nbsp;Look&nbsp</h4>-->
<!--						</div>-->
<!--					</a>-->
<!--				</div>-->
<!--				<div class="col-sm">-->
<!--					<a-->
<!--							href="category.html"-->
<!--							class="collection-grid-3-item image-hover-scale"-->
<!--					>-->
<!--						<div-->
<!--								class="collection-grid-3-item-img image-container"-->
<!--								style="padding-bottom: 68.22%"-->
<!--						>-->
<!--							<img-->
<!--									src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--									data-src="/images/skins/fashion/banner-category-02.png"-->
<!--									class="lazyload fade-up"-->
<!--									alt="Banner"-->
<!--							>-->
<!--							<div class="foxic-loader"></div>-->
<!--						</div>-->
<!--						<div class="collection-grid-3-caption-bg">-->
<!--							<h3 class="collection-grid-3-title">Bottom</h3>-->
<!--							<h4 class="collection-grid-3-subtitle">Live&nbsp;for&nbsp;Fashion</h4>-->
<!--						</div>-->
<!--					</a>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
	<div class="holder">
		<div class="container">
			<!-- Two columns -->
			<!-- Page Title -->
			<div class="page-title text-center">
				<h1 id="categoryTitle"></h1>
			</div>
			<!-- /Page Title -->
			<!-- Filter Row -->
			<div class="filter-row">
				<div class="row">
					<div><span class="items-count">0</span> item(s)</div>
					<div class="select-wrap d-none d-md-flex">
						<div class="select-label">SORT:</div>
						<div class="select-wrapper select-wrapper-xxs">
							<select class="form-control input-sm">
								<option value="featured">Featured</option>
								<option value="rating">Rating</option>
								<option value="price">Price</option>
							</select>
						</div>
					</div>
					<div class="select-wrap d-none d-md-flex">
						<div class="select-label">VIEW:</div>
						<div class="select-wrapper select-wrapper-xxs">
							<select class="form-control input-sm">
								<option value="featured">12</option>
								<option value="rating">36</option>
								<option value="price">100</option>
							</select>
						</div>
					</div>
					<div class="viewmode-wrap">
						<div class="view-mode">
							<span class="js-horview d-none d-lg-inline-flex"><i class="icon-grid"></i></span>
							<span class="js-gridview"><i class="icon-grid"></i></span>
							<span class="js-listview"><i class="icon-list"></i></span>
						</div>
					</div>
				</div>
			</div>
			<!-- /Filter Row -->
			<div class="row">
				<!-- Left column -->
				<div
						class="col-lg-4 aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop"
						data-grid-tab-content
				>
					<div class="filter-col-content filter-mobile-content">
<!--						<div class="sidebar-block">-->
<!--							<div class="sidebar-block_title">-->
<!--								<span>Current selection</span>-->
<!--							</div>-->
<!--							<div class="sidebar-block_content">-->
<!--								<div class="selected-filters-wrap">-->
<!--									<ul class="selected-filters">-->
<!--										<li>-->
<!--											<a href="#">Grey</a>-->
<!--										</li>-->
<!--										<li>-->
<!--											<a href="#">Men</a>-->
<!--										</li>-->
<!--										<li>-->
<!--											<a href="#">Above $200</a>-->
<!--										</li>-->
<!--									</ul>-->
<!--									<div class="d-flex flex-wrap align-items-center">-->
<!--										<a-->
<!--												href="#"-->
<!--												class="clear-filters"-->
<!--										>-->
<!--											<span>Clear All</span>-->
<!--										</a>-->
<!--										<div class="selected-filters-count ml-auto d-none d-lg-block">Selected-->
<!--											<span>6 items</span>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="sidebar-block d-filter-mobile">-->
<!--							<h3 class="mb-1">SORT BY</h3>-->
<!--							<div class="select-wrapper select-wrapper-xs">-->
<!--								<select class="form-control">-->
<!--									<option value="featured">Featured</option>-->
<!--									<option value="rating">Rating</option>-->
<!--									<option value="price">Price</option>-->
<!--								</select>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="sidebar-block filter-group-block open">-->
<!--							<div class="sidebar-block_title">-->
<!--								<span>Categories</span>-->
<!--								<span class="toggle-arrow"><span></span><span></span></span>-->
<!--							</div>-->
<!--							<div class="sidebar-block_content">-->
<!--								<ul class="category-list">-->
<!--									<li class="active">-->
<!--										<a-->
<!--												href="category.html"-->
<!--												title="Casual"-->
<!--												class="open"-->
<!--										>Casual&nbsp;<span>(30)</span>-->
<!--										</a>-->
<!--										<div class="toggle-category js-toggle-category">-->
<!--											<span><i class="icon-angle-down"></i></span>-->
<!--										</div>-->
<!--										<ul class="category-list category-list">-->
<!--											<li>-->
<!--												<a-->
<!--														href="category.html"-->
<!--														title="Men"-->
<!--												>Men&nbsp;<span>(10)</span>-->
<!--												</a>-->
<!--											</li>-->
<!--											<li>-->
<!--												<a-->
<!--														href="category.html"-->
<!--														title="Women"-->
<!--												>Women&nbsp;<span>(10)</span>-->
<!--												</a>-->
<!--											</li>-->
<!--											<li>-->
<!--												<a-->
<!--														href="category.html"-->
<!--														title="Accessories"-->
<!--												>Accessories&nbsp;<span>(10)</span>-->
<!--												</a>-->
<!--											</li>-->
<!--										</ul>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="category.html"-->
<!--												title="T-Shirts"-->
<!--												class="open"-->
<!--										>T-Shirts-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="category.html"-->
<!--												title="Medical"-->
<!--												class="open"-->
<!--										>Medical-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="category.html"-->
<!--												title="FoodMarket"-->
<!--												class="open"-->
<!--										>FoodMarket-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="category.html"-->
<!--												title="Bikes"-->
<!--												class="open"-->
<!--										>Bikes&nbsp;<span>(12)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="category.html"-->
<!--												title="Cosmetics"-->
<!--												class="open"-->
<!--										>Cosmetics&nbsp;<span>(16)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="category.html"-->
<!--												title="Fishing"-->
<!--												class="open"-->
<!--										>Fishing&nbsp;<span>(20)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="category.html"-->
<!--												title="Electronics"-->
<!--												class="open"-->
<!--										>Electronics&nbsp;<span>(15)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="category.html"-->
<!--												title="Games"-->
<!--												class="open"-->
<!--										>Games&nbsp;<span>(14)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--								</ul>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="sidebar-block filter-group-block collapsed">-->
<!--							<div class="sidebar-block_title">-->
<!--								<span>Colors</span>-->
<!--								<span class="toggle-arrow"><span></span><span></span></span>-->
<!--							</div>-->
<!--							<div class="sidebar-block_content">-->
<!--								<ul class="color-list two-column">-->
<!--									<li class="active">-->
<!--										<a-->
<!--												href="#"-->
<!--												data-tooltip="Dark Red"-->
<!--												title="Dark Red"-->
<!--										><span class="value"><img-->
<!--														src="/images/colorswatch/color-red.png"-->
<!--														alt=""-->
<!--												></span>-->
<!--											<span-->
<!--													class="colorname"-->
<!--											>Red (87)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="#"-->
<!--												data-tooltip="Pink"-->
<!--												title="Pink"-->
<!--										><span class="value"><img-->
<!--														src="/images/colorswatch/color-pink.png"-->
<!--														alt=""-->
<!--												></span>-->
<!--											<span-->
<!--													class="colorname"-->
<!--											>Pink (95)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="#"-->
<!--												data-tooltip="Violet"-->
<!--												title="Violet"-->
<!--										><span class="value"><img-->
<!--														src="/images/colorswatch/color-violet.png"-->
<!--														alt=""-->
<!--												></span>-->
<!--											<span-->
<!--													class="colorname"-->
<!--											>Violet (18)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="#"-->
<!--												data-tooltip="Blue"-->
<!--												title="Blue"-->
<!--										><span class="value"><img-->
<!--														src="/images/colorswatch/color-blue.png"-->
<!--														alt=""-->
<!--												></span>-->
<!--											<span-->
<!--													class="colorname"-->
<!--											>Blue (78)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="#"-->
<!--												data-tooltip="Marine"-->
<!--												title="Marine"-->
<!--										><span class="value"><img-->
<!--														src="/images/colorswatch/color-marine.png"-->
<!--														alt=""-->
<!--												></span>-->
<!--											<span-->
<!--													class="colorname"-->
<!--											>Marine (45)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="#"-->
<!--												data-tooltip="Orange"-->
<!--												title="Orange"-->
<!--										><span class="value"><img-->
<!--														src="/images/colorswatch/color-orange.png"-->
<!--														alt=""-->
<!--												></span>-->
<!--											<span-->
<!--													class="colorname"-->
<!--											>Orange (96)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="#"-->
<!--												data-tooltip="Yellow"-->
<!--												title="Yellow"-->
<!--										><span class="value"><img-->
<!--														src="/images/colorswatch/color-yellow.png"-->
<!--														alt=""-->
<!--												></span>-->
<!--											<span-->
<!--													class="colorname"-->
<!--											>Yellow (55)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="#"-->
<!--												data-tooltip="Dark Yellow"-->
<!--												title="Dark Yellow"-->
<!--										><span-->
<!--													class="value"-->
<!--											><img-->
<!--														src="images/colorswatch/color-darkyellow.png"-->
<!--														alt=""-->
<!--												></span>-->
<!--											<span-->
<!--													class="colorname"-->
<!--											>Dark Yellow (2)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="#"-->
<!--												data-tooltip="Black"-->
<!--												title="Black"-->
<!--										><span class="value"><img-->
<!--														src="/images/colorswatch/color-black.png"-->
<!--														alt=""-->
<!--												></span>-->
<!--											<span-->
<!--													class="colorname"-->
<!--											>Black (15)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a-->
<!--												href="#"-->
<!--												data-tooltip="White"-->
<!--												title="White"-->
<!--										><span class="value"><img-->
<!--														src="/images/colorswatch/color-white.png"-->
<!--														alt=""-->
<!--												></span>-->
<!--											<span-->
<!--													class="colorname"-->
<!--											>White (58)</span>-->
<!--										</a>-->
<!--									</li>-->
<!--								</ul>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="sidebar-block filter-group-block collapsed">-->
<!--							<div class="sidebar-block_title">-->
<!--								<span>Size</span>-->
<!--								<span class="toggle-arrow"><span></span><span></span></span>-->
<!--							</div>-->
<!--							<div class="sidebar-block_content">-->
<!--								<ul-->
<!--										class="category-list two-column size-list"-->
<!--										data-sort='["XXS","XS","S","M","L","XL","XXL","XXXL"]'-->
<!--								>-->
<!--									<li-->
<!--											data-value="L"-->
<!--											class="active"-->
<!--									>-->
<!--										<a href="#">L</a>-->
<!--									</li>-->
<!--									<li data-value="XL">-->
<!--										<a href="#">XL</a>-->
<!--									</li>-->
<!--									<li data-value="XXS">-->
<!--										<a href="#">XXS</a>-->
<!--									</li>-->
<!--									<li data-value="XS">-->
<!--										<a href="#">XS</a>-->
<!--									</li>-->
<!--									<li data-value="S">-->
<!--										<a href="#">S</a>-->
<!--									</li>-->
<!--									<li data-value="XXL">-->
<!--										<a href="#">XXL</a>-->
<!--									</li>-->
<!--									<li data-value="XXXL">-->
<!--										<a href="#">XXXL</a>-->
<!--									</li>-->
<!--								</ul>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="sidebar-block filter-group-block collapsed">-->
<!--							<div class="sidebar-block_title">-->
<!--								<span>Brands</span>-->
<!--								<span class="toggle-arrow"><span></span><span></span></span>-->
<!--							</div>-->
<!--							<div class="sidebar-block_content">-->
<!--								<ul class="category-list">-->
<!--									<li>-->
<!--										<a href="#">Adidas</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a href="#">Nike</a>-->
<!--									</li>-->
<!--									<li class="active">-->
<!--										<a href="#">Reebok</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a href="#">Ralph Lauren</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a href="#">Delpozo</a>-->
<!--									</li>-->
<!--								</ul>-->
<!--							</div>-->
<!--						</div>-->
						<div class="sidebar-block filter-group-block">
							<div class="sidebar-block_title">
								<span>Price</span>
								<span class="toggle-arrow"><span></span><span></span></span>
							</div>
							<div class="sidebar-block_content">
								<ul class="category-list">
									<li>
										<a href="#">$100-$200</a>
									</li>
									<li class="active">
										<a href="#">Above $200</a>
									</li>
									<li>
										<a href="#">Under $100</a>
									</li>
								</ul>
							</div>
						</div>
<!--						<div class="sidebar-block filter-group-block collapsed">-->
<!--							<div class="sidebar-block_title">-->
<!--								<span>Popular tags</span>-->
<!--								<span class="toggle-arrow"><span></span><span></span></span>-->
<!--							</div>-->
<!--							<div class="sidebar-block_content">-->
<!--								<ul class="tags-list">-->
<!--									<li class="active">-->
<!--										<a href="#">Jeans</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a href="#">St.Valentine’s gift</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a href="#">Sunglasses</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a href="#">Discount</a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<a href="#">Maxi dress</a>-->
<!--									</li>-->
<!--								</ul>-->
<!--							</div>-->
<!--						</div>-->
<!--						<a-->
<!--								href="https://bit.ly/3eJX5XE"-->
<!--								class="bnr image-hover-scale bnr--bottom bnr--left"-->
<!--								data-fontratio="3.95"-->
<!--						>-->
<!--							<div class="bnr-img">-->
<!--								<img-->
<!--										src="/images/banners/banner-collection-aside.png"-->
<!--										alt=""-->
<!--								>-->
<!--							</div>-->
<!--						</a>-->
					</div>
				</div>
				<!-- filter toggle -->
				<div class="filter-toggle js-filter-toggle">
					<div class="loader-horizontal js-loader-horizontal">
						<div class="progress">
							<div
									class="progress-bar progress-bar-striped progress-bar-animated"
									style="width: 100%"
							></div>
						</div>
					</div>
					<span class="filter-toggle-icons js-filter-btn">
						<i class="icon-filter"></i>
						<i class="icon-filter-close"></i>
					</span>
					<span class="filter-toggle-text">
						<a
								href="#"
								class="filter-btn-open js-filter-btn"
						>
							REFINE & SORT
						</a>
						<a
								href="#"
								class="filter-btn-close js-filter-btn"
						>
							RESET
						</a>
						<a
								href="#"
								class="filter-btn-apply js-filter-btn"
						>
							APPLY & CLOSE
						</a>
					</span>
				</div>
				<!-- /Left column -->
				<!-- Center column -->
				<div class="col-lg aside">
					<div class="prd-grid-wrap">
						<!-- Products Grid -->
						<div
								class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid"
								id="category-products-grid"
								data-grid-tab-content
						>
							<!-- Products go here-->
						</div>
						<div
								class="loader-horizontal-sm js-loader-horizontal-sm d-none"
								data-loader-horizontal
								style="opacity: 0;"
						>
							<span></span>
						</div>
						<button style="display:none;" id="view_more_products"></button>
<!--						<div class="circle-loader-wrap">-->
<!--							<div class="circle-loader">-->
<!--								<a-->
<!--										href="ajax/ajax-product-category.json"-->
<!--										data-total="30"-->
<!--										data-loaded="12"-->
<!--										data-load="6"-->
<!--										class="lazyload js-circle-loader"-->
<!--								>-->
<!--									<svg-->
<!--											id="svg_d"-->
<!--											version="1.1"-->
<!--											xmlns="http://www.w3.org/2000/svg"-->
<!--									>-->
<!--										<circle-->
<!--												cx="50%"-->
<!--												cy="50%"-->
<!--												r="63"-->
<!--												fill="transparent"-->
<!--										></circle>-->
<!--										<circle-->
<!--												class="js-circle-bar"-->
<!--												cx="50%"-->
<!--												cy="50%"-->
<!--												r="63"-->
<!--												fill="transparent"-->
<!--										></circle>-->
<!--									</svg>-->
<!--									<svg-->
<!--											id="svg_m"-->
<!--											version="1.1"-->
<!--											xmlns="http://www.w3.org/2000/svg"-->
<!--									>-->
<!--										<circle-->
<!--												cx="50%"-->
<!--												cy="50%"-->
<!--												r="50"-->
<!--												fill="transparent"-->
<!--										></circle>-->
<!--										<circle-->
<!--												class="js-circle-bar"-->
<!--												cx="50%"-->
<!--												cy="50%"-->
<!--												r="50"-->
<!--												fill="transparent"-->
<!--										></circle>-->
<!--									</svg>-->
<!--									<div class="circle-loader-text">Load More</div>-->
<!--									<div class="circle-loader-text-alt">-->
<!--										<span class="js-circle-loader-start"></span>&nbsp;out of&nbsp;<span class="js-circle-loader-end"></span>-->
<!--									</div>-->
<!--								</a>-->
<!--							</div>-->
<!--						</div>-->
						<!-- /Products Grid -->
						<!--<div class="mt-2">-->
						<!--<button class="btn" onclick="THEME.loaderHorizontalSm.open()">Show Small Loader</button>-->
						<!--<button class="btn" onclick="THEME.loaderHorizontalSm.close()">Hide Small Loader</button>-->
						<!--</div>-->
						<!--<div class="mt-2">-->
						<!--<button class="btn" onclick="THEME.loaderCategory.open()">Show Opacity</button>-->
						<!--<button class="btn" onclick="THEME.loaderCategory.close()">Hide Opacity</button>-->
						<!--</div>-->
					</div>
				</div>
				<!-- /Center column -->
			</div>
			<!-- /Two columns -->
		</div>
	</div>
<!--	<div class="holder">-->
<!--		<div class="container">-->
<!--			<div class="title-wrap text-center">-->
<!--				<h2 class="h1-style">You may also like</h2>-->
<!--				<div class="carousel-arrows carousel-arrows--center"></div>-->
<!--			</div>-->
<!--			<div-->
<!--					class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"-->
<!--					data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'-->
<!--			>-->
<!--				<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--					<div class="prd-inside">-->
<!--						<div class="prd-img-area">-->
<!--							<a-->
<!--									href="product.html"-->
<!--									class="prd-img image-hover-scale image-container"-->
<!--							>-->
<!--								<img-->
<!--										src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--										data-src="images/skins/fashion/products/product-06-1.jpg"-->
<!--										alt="Midi Dress with Belt"-->
<!--										class="js-prd-img lazyload fade-up"-->
<!--								>-->
<!--								<div class="foxic-loader"></div>-->
<!--								<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--								</div>-->
<!--							</a>-->
<!--							<div class="prd-circle-labels">-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--										title="Add To Wishlist"-->
<!--								>-->
<!--									<i class="icon-heart-stroke"></i>-->
<!--								</a>-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--										title="Remove From Wishlist"-->
<!--								>-->
<!--									<i class="icon-heart-hover"></i>-->
<!--								</a>-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--										data-src="ajax/ajax-quickview.html"-->
<!--								>-->
<!--									<i class="icon-eye"></i>-->
<!--									<span>QUICK VIEW</span>-->
<!--								</a>-->
<!---->
<!--								<div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">-->
<!--									<i class="icon-palette">-->
<!--										<span class="path1"></span>-->
<!--										<span class="path2"></span>-->
<!--										<span class="path3"></span>-->
<!--										<span class="path4"></span>-->
<!--										<span class="path5"></span>-->
<!--										<span class="path6"></span>-->
<!--										<span class="path7"></span>-->
<!--										<span class="path8"></span>-->
<!--										<span class="path9"></span>-->
<!--										<span class="path10"></span>-->
<!--									</i>-->
<!--									<ul>-->
<!--										<li data-image="images/skins/fashion/products/product-06-1.jpg">-->
<!--											<a-->
<!--													class="js-color-toggle"-->
<!--													data-toggle="tooltip"-->
<!--													data-placement="left"-->
<!--													title="Color Name"-->
<!--											>-->
<!--												<img-->
<!--														src="images/colorswatch/color-grey.png"-->
<!--														alt=""-->
<!--												>-->
<!--											</a>-->
<!--										</li>-->
<!--										<li data-image="images/skins/fashion/products/product-06-color-2.jpg">-->
<!--											<a-->
<!--													class="js-color-toggle"-->
<!--													data-toggle="tooltip"-->
<!--													data-placement="left"-->
<!--													title="Color Name"-->
<!--											>-->
<!--												<img-->
<!--														src="images/colorswatch/color-green.png"-->
<!--														alt=""-->
<!--												>-->
<!--											</a>-->
<!--										</li>-->
<!--										<li data-image="images/skins/fashion/products/product-06-color-3.jpg">-->
<!--											<a-->
<!--													class="js-color-toggle"-->
<!--													data-toggle="tooltip"-->
<!--													data-placement="left"-->
<!--													title="Color Name"-->
<!--											>-->
<!--												<img-->
<!--														src="images/colorswatch/color-black.png"-->
<!--														alt=""-->
<!--												>-->
<!--											</a>-->
<!--										</li>-->
<!--									</ul>-->
<!--								</div>-->
<!---->
<!--							</div>-->
<!---->
<!--							<ul class="list-options color-swatch">-->
<!--								<li-->
<!--										data-image="images/skins/fashion/products/product-06-1.jpg"-->
<!--										class="active"-->
<!--								>-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-06-1.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!--								<li data-image="images/skins/fashion/products/product-06-2.jpg">-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-06-2.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!---->
<!--								<li data-image="images/skins/fashion/products/product-06-3.jpg">-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-06-3.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!---->
<!--							</ul>-->
<!---->
<!--						</div>-->
<!--						<div class="prd-info">-->
<!--							<div class="prd-info-wrap">-->
<!--								<div class="prd-info-top">-->
<!--									<div class="prd-rating">-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="prd-rating justify-content-center">-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--								</div>-->
<!--								<div class="prd-tag">-->
<!--									<a href="#">Seiko</a>-->
<!--								</div>-->
<!--								<h2 class="prd-title">-->
<!--									<a href="product.html">Midi Dress with Belt</a>-->
<!--								</h2>-->
<!--								<div class="prd-description">-->
<!--									Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent-->
<!--									per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.-->
<!--								</div>-->
<!--								<div class="prd-action">-->
<!--									<form action="#">-->
<!--										<button-->
<!--												class="btn js-prd-addtocart"-->
<!--												data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--										>Add To Cart-->
<!--										</button>-->
<!--									</form>-->
<!--								</div>-->
<!--							</div>-->
<!--							<div class="prd-hovers">-->
<!--								<div class="prd-circle-labels">-->
<!--									<div>-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--												title="Add To Wishlist"-->
<!--										>-->
<!--											<i class="icon-heart-stroke"></i>-->
<!--										</a>-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--												title="Remove From Wishlist"-->
<!--										>-->
<!--											<i class="icon-heart-hover"></i>-->
<!--										</a>-->
<!--									</div>-->
<!--									<div class="prd-hide-mobile">-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-qview js-prd-quickview"-->
<!--												data-src="ajax/ajax-quickview.html"-->
<!--										>-->
<!--											<i class="icon-eye"></i>-->
<!--											<span>QUICK VIEW</span>-->
<!--										</a>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="prd-price">-->
<!---->
<!--									<div class="price-new">$ 180</div>-->
<!--								</div>-->
<!--								<div class="prd-action">-->
<!--									<div class="prd-action-left">-->
<!--										<form action="#">-->
<!--											<button-->
<!--													class="btn js-prd-addtocart"-->
<!--													data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--											>Add To Cart-->
<!--											</button>-->
<!--										</form>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--					<div class="prd-inside">-->
<!--						<div class="prd-img-area">-->
<!--							<a-->
<!--									href="product.html"-->
<!--									class="prd-img image-hover-scale image-container"-->
<!--							>-->
<!--								<img-->
<!--										src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--										data-src="images/skins/fashion/products/product-17-1.jpg"-->
<!--										alt="Stand Collar Shirt"-->
<!--										class="js-prd-img lazyload fade-up"-->
<!--								>-->
<!--								<div class="foxic-loader"></div>-->
<!--								<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--									<div class="label-sale">-->
<!--										<span>-10% <span class="sale-text">Sale</span></span>-->
<!---->
<!--										<div class="countdown-circle">-->
<!--											<div-->
<!--													class="countdown js-countdown"-->
<!--													data-countdown="2021/07/01"-->
<!--											></div>-->
<!--										</div>-->
<!---->
<!--									</div>-->
<!---->
<!---->
<!--								</div>-->
<!--							</a>-->
<!--							<div class="prd-circle-labels">-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--										title="Add To Wishlist"-->
<!--								>-->
<!--									<i class="icon-heart-stroke"></i>-->
<!--								</a>-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--										title="Remove From Wishlist"-->
<!--								>-->
<!--									<i class="icon-heart-hover"></i>-->
<!--								</a>-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--										data-src="ajax/ajax-quickview.html"-->
<!--								>-->
<!--									<i class="icon-eye"></i>-->
<!--									<span>QUICK VIEW</span>-->
<!--								</a>-->
<!---->
<!--							</div>-->
<!---->
<!--							<ul class="list-options color-swatch">-->
<!--								<li-->
<!--										data-image="images/skins/fashion/products/product-17-1.jpg"-->
<!--										class="active"-->
<!--								>-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-17-1.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!--								<li data-image="images/skins/fashion/products/product-17-2.jpg">-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-17-2.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!---->
<!--								<li data-image="images/skins/fashion/products/product-17-3.jpg">-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-17-3.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!---->
<!--							</ul>-->
<!---->
<!--						</div>-->
<!--						<div class="prd-info">-->
<!--							<div class="prd-info-wrap">-->
<!--								<div class="prd-info-top">-->
<!--									<div class="prd-rating">-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="prd-rating justify-content-center">-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--								</div>-->
<!--								<div class="prd-tag">-->
<!--									<a href="#">FOXic</a>-->
<!--								</div>-->
<!--								<h2 class="prd-title">-->
<!--									<a href="product.html">Stand Collar Shirt</a>-->
<!--								</h2>-->
<!--								<div class="prd-description">-->
<!--									Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent-->
<!--									per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.-->
<!--								</div>-->
<!--								<div class="prd-action">-->
<!--									<form action="#">-->
<!--										<button-->
<!--												class="btn js-prd-addtocart"-->
<!--												data-product='{"name": "Stand Collar Shirt", "path":"images/skins/fashion/products/product-17-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--										>Add To Cart-->
<!--										</button>-->
<!--									</form>-->
<!--								</div>-->
<!--							</div>-->
<!--							<div class="prd-hovers">-->
<!--								<div class="prd-circle-labels">-->
<!--									<div>-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--												title="Add To Wishlist"-->
<!--										>-->
<!--											<i class="icon-heart-stroke"></i>-->
<!--										</a>-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--												title="Remove From Wishlist"-->
<!--										>-->
<!--											<i class="icon-heart-hover"></i>-->
<!--										</a>-->
<!--									</div>-->
<!--									<div class="prd-hide-mobile">-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-qview js-prd-quickview"-->
<!--												data-src="ajax/ajax-quickview.html"-->
<!--										>-->
<!--											<i class="icon-eye"></i>-->
<!--											<span>QUICK VIEW</span>-->
<!--										</a>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="prd-price">-->
<!---->
<!--									<div class="price-old">$ 200</div>-->
<!---->
<!--									<div class="price-new">$ 180</div>-->
<!--								</div>-->
<!--								<div class="prd-action">-->
<!--									<div class="prd-action-left">-->
<!--										<form action="#">-->
<!--											<button-->
<!--													class="btn js-prd-addtocart"-->
<!--													data-product='{"name": "Stand Collar Shirt", "path":"images/skins/fashion/products/product-17-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--											>Add To Cart-->
<!--											</button>-->
<!--										</form>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--					<div class="prd-inside">-->
<!--						<div class="prd-img-area">-->
<!--							<a-->
<!--									href="product.html"-->
<!--									class="prd-img image-hover-scale image-container"-->
<!--							>-->
<!--								<img-->
<!--										src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--										data-src="images/skins/fashion/products/product-21-1.jpg"-->
<!--										alt="Genuine Leather Strap Watch"-->
<!--										class="js-prd-img lazyload fade-up"-->
<!--								>-->
<!--								<div class="foxic-loader"></div>-->
<!--								<div class="prd-big-squared-labels">-->
<!---->
<!--									<div class="label-new">-->
<!--										<span>New</span>-->
<!--									</div>-->
<!---->
<!---->
<!--								</div>-->
<!--							</a>-->
<!--							<div class="prd-circle-labels">-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--										title="Add To Wishlist"-->
<!--								>-->
<!--									<i class="icon-heart-stroke"></i>-->
<!--								</a>-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--										title="Remove From Wishlist"-->
<!--								>-->
<!--									<i class="icon-heart-hover"></i>-->
<!--								</a>-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--										data-src="ajax/ajax-quickview.html"-->
<!--								>-->
<!--									<i class="icon-eye"></i>-->
<!--									<span>QUICK VIEW</span>-->
<!--								</a>-->
<!---->
<!--							</div>-->
<!---->
<!--							<ul class="list-options color-swatch">-->
<!--								<li-->
<!--										data-image="images/skins/fashion/products/product-21-1.jpg"-->
<!--										class="active"-->
<!--								>-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-21-1.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!--								<li data-image="images/skins/fashion/products/product-21-2.jpg">-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-21-2.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!---->
<!--								<li data-image="images/skins/fashion/products/product-21-3.jpg">-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-21-3.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!---->
<!--							</ul>-->
<!---->
<!--						</div>-->
<!--						<div class="prd-info">-->
<!--							<div class="prd-info-wrap">-->
<!--								<div class="prd-info-top">-->
<!--									<div class="prd-rating">-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="prd-rating justify-content-center">-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--								</div>-->
<!--								<div class="prd-tag">-->
<!--									<a href="#">FOXic</a>-->
<!--								</div>-->
<!--								<h2 class="prd-title">-->
<!--									<a href="product.html">Genuine Leather Strap Watch</a>-->
<!--								</h2>-->
<!--								<div class="prd-description">-->
<!--									Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent-->
<!--									per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.-->
<!--								</div>-->
<!--								<div class="prd-action">-->
<!--									<form action="#">-->
<!--										<button-->
<!--												class="btn js-prd-addtocart"-->
<!--												data-product='{"name": "Genuine Leather Strap Watch", "path":"images/skins/fashion/products/product-21-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--										>Add To Cart-->
<!--										</button>-->
<!--									</form>-->
<!--								</div>-->
<!--							</div>-->
<!--							<div class="prd-hovers">-->
<!--								<div class="prd-circle-labels">-->
<!--									<div>-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--												title="Add To Wishlist"-->
<!--										>-->
<!--											<i class="icon-heart-stroke"></i>-->
<!--										</a>-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--												title="Remove From Wishlist"-->
<!--										>-->
<!--											<i class="icon-heart-hover"></i>-->
<!--										</a>-->
<!--									</div>-->
<!--									<div class="prd-hide-mobile">-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-qview js-prd-quickview"-->
<!--												data-src="ajax/ajax-quickview.html"-->
<!--										>-->
<!--											<i class="icon-eye"></i>-->
<!--											<span>QUICK VIEW</span>-->
<!--										</a>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="prd-price">-->
<!---->
<!--									<div class="price-new">$ 180</div>-->
<!--								</div>-->
<!--								<div class="prd-action">-->
<!--									<div class="prd-action-left">-->
<!--										<form action="#">-->
<!--											<button-->
<!--													class="btn js-prd-addtocart"-->
<!--													data-product='{"name": "Genuine Leather Strap Watch", "path":"images/skins/fashion/products/product-21-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--											>Add To Cart-->
<!--											</button>-->
<!--										</form>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--					<div class="prd-inside">-->
<!--						<div class="prd-img-area">-->
<!--							<a-->
<!--									href="product.html"-->
<!--									class="prd-img image-hover-scale image-container"-->
<!--							>-->
<!--								<img-->
<!--										src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--										data-src="images/skins/fashion/products/product-26-1.jpg"-->
<!--										alt="Pureboost Running Shoes"-->
<!--										class="js-prd-img lazyload fade-up"-->
<!--								>-->
<!--								<div class="foxic-loader"></div>-->
<!--								<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--								</div>-->
<!--							</a>-->
<!--							<div class="prd-circle-labels">-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--										title="Add To Wishlist"-->
<!--								>-->
<!--									<i class="icon-heart-stroke"></i>-->
<!--								</a>-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--										title="Remove From Wishlist"-->
<!--								>-->
<!--									<i class="icon-heart-hover"></i>-->
<!--								</a>-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--										data-src="ajax/ajax-quickview.html"-->
<!--								>-->
<!--									<i class="icon-eye"></i>-->
<!--									<span>QUICK VIEW</span>-->
<!--								</a>-->
<!---->
<!--							</div>-->
<!---->
<!--							<ul class="list-options color-swatch">-->
<!--								<li-->
<!--										data-image="images/skins/fashion/products/product-26-1.jpg"-->
<!--										class="active"-->
<!--								>-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-26-1.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!--								<li data-image="images/skins/fashion/products/product-26-2.jpg">-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-26-2.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!---->
<!--								<li data-image="images/skins/fashion/products/product-26-3.jpg">-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-26-3.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!---->
<!--							</ul>-->
<!---->
<!--						</div>-->
<!--						<div class="prd-info">-->
<!--							<div class="prd-info-wrap">-->
<!--								<div class="prd-info-top">-->
<!--									<div class="prd-rating">-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="prd-rating justify-content-center">-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--								</div>-->
<!--								<div class="prd-tag">-->
<!--									<a href="#">FOXic</a>-->
<!--								</div>-->
<!--								<h2 class="prd-title">-->
<!--									<a href="product.html">Pureboost Running Shoes</a>-->
<!--								</h2>-->
<!--								<div class="prd-description">-->
<!--									Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent-->
<!--									per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.-->
<!--								</div>-->
<!--								<div class="prd-action">-->
<!--									<form action="#">-->
<!--										<button-->
<!--												class="btn js-prd-addtocart"-->
<!--												data-product='{"name": "Pureboost Running Shoes", "path":"images/skins/fashion/products/product-26-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--										>Add To Cart-->
<!--										</button>-->
<!--									</form>-->
<!--								</div>-->
<!--							</div>-->
<!--							<div class="prd-hovers">-->
<!--								<div class="prd-circle-labels">-->
<!--									<div>-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--												title="Add To Wishlist"-->
<!--										>-->
<!--											<i class="icon-heart-stroke"></i>-->
<!--										</a>-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--												title="Remove From Wishlist"-->
<!--										>-->
<!--											<i class="icon-heart-hover"></i>-->
<!--										</a>-->
<!--									</div>-->
<!--									<div class="prd-hide-mobile">-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-qview js-prd-quickview"-->
<!--												data-src="ajax/ajax-quickview.html"-->
<!--										>-->
<!--											<i class="icon-eye"></i>-->
<!--											<span>QUICK VIEW</span>-->
<!--										</a>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="prd-price">-->
<!---->
<!--									<div class="price-new">$ 180</div>-->
<!--								</div>-->
<!--								<div class="prd-action">-->
<!--									<div class="prd-action-left">-->
<!--										<form action="#">-->
<!--											<button-->
<!--													class="btn js-prd-addtocart"-->
<!--													data-product='{"name": "Pureboost Running Shoes", "path":"images/skins/fashion/products/product-26-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--											>Add To Cart-->
<!--											</button>-->
<!--										</form>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--					<div class="prd-inside">-->
<!--						<div class="prd-img-area">-->
<!--							<a-->
<!--									href="product.html"-->
<!--									class="prd-img image-hover-scale image-container"-->
<!--							>-->
<!--								<img-->
<!--										src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--										data-src="images/skins/fashion/products/product-30-1.jpg"-->
<!--										alt="Multiple Pocket Waist Pack"-->
<!--										class="js-prd-img lazyload fade-up"-->
<!--								>-->
<!--								<div class="foxic-loader"></div>-->
<!--								<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--								</div>-->
<!--							</a>-->
<!--							<div class="prd-circle-labels">-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--										title="Add To Wishlist"-->
<!--								>-->
<!--									<i class="icon-heart-stroke"></i>-->
<!--								</a>-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--										title="Remove From Wishlist"-->
<!--								>-->
<!--									<i class="icon-heart-hover"></i>-->
<!--								</a>-->
<!--								<a-->
<!--										href="#"-->
<!--										class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--										data-src="ajax/ajax-quickview.html"-->
<!--								>-->
<!--									<i class="icon-eye"></i>-->
<!--									<span>QUICK VIEW</span>-->
<!--								</a>-->
<!---->
<!--							</div>-->
<!---->
<!--							<ul class="list-options color-swatch">-->
<!--								<li-->
<!--										data-image="images/skins/fashion/products/product-30-1.jpg"-->
<!--										class="active"-->
<!--								>-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-30-1.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!--								<li data-image="images/skins/fashion/products/product-30-2.jpg">-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-30-2.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!---->
<!--								<li data-image="images/skins/fashion/products/product-30-3.jpg">-->
<!--									<a-->
<!--											href="#"-->
<!--											class="js-color-toggle"-->
<!--											data-toggle="tooltip"-->
<!--											data-placement="right"-->
<!--											title="Color Name"-->
<!--									>-->
<!--										<img-->
<!--												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--												data-src="images/skins/fashion/products/product-30-3.jpg"-->
<!--												class="lazyload fade-up"-->
<!--												alt="Color Name"-->
<!--										>-->
<!--									</a>-->
<!--								</li>-->
<!---->
<!---->
<!--							</ul>-->
<!---->
<!--						</div>-->
<!--						<div class="prd-info">-->
<!--							<div class="prd-info-wrap">-->
<!--								<div class="prd-info-top">-->
<!--									<div class="prd-rating">-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--										<i class="icon-star-fill fill"></i>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="prd-rating justify-content-center">-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--									<i class="icon-star-fill fill"></i>-->
<!--								</div>-->
<!--								<div class="prd-tag">-->
<!--									<a href="#">FOXic</a>-->
<!--								</div>-->
<!--								<h2 class="prd-title">-->
<!--									<a href="product.html">Multiple Pocket Waist Pack</a>-->
<!--								</h2>-->
<!--								<div class="prd-description">-->
<!--									Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent-->
<!--									per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.-->
<!--								</div>-->
<!--								<div class="prd-action">-->
<!--									<form action="#">-->
<!--										<button-->
<!--												class="btn js-prd-addtocart"-->
<!--												data-product='{"name": "Multiple Pocket Waist Pack", "path":"images/skins/fashion/products/product-30-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--										>Add To Cart-->
<!--										</button>-->
<!--									</form>-->
<!--								</div>-->
<!--							</div>-->
<!--							<div class="prd-hovers">-->
<!--								<div class="prd-circle-labels">-->
<!--									<div>-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--												title="Add To Wishlist"-->
<!--										>-->
<!--											<i class="icon-heart-stroke"></i>-->
<!--										</a>-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--												title="Remove From Wishlist"-->
<!--										>-->
<!--											<i class="icon-heart-hover"></i>-->
<!--										</a>-->
<!--									</div>-->
<!--									<div class="prd-hide-mobile">-->
<!--										<a-->
<!--												href="#"-->
<!--												class="circle-label-qview js-prd-quickview"-->
<!--												data-src="ajax/ajax-quickview.html"-->
<!--										>-->
<!--											<i class="icon-eye"></i>-->
<!--											<span>QUICK VIEW</span>-->
<!--										</a>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="prd-price">-->
<!---->
<!--									<div class="price-new">$ 180</div>-->
<!--								</div>-->
<!--								<div class="prd-action">-->
<!--									<div class="prd-action-left">-->
<!--										<form action="#">-->
<!--											<button-->
<!--													class="btn js-prd-addtocart"-->
<!--													data-product='{"name": "Multiple Pocket Waist Pack", "path":"images/skins/fashion/products/product-30-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--											>Add To Cart-->
<!--											</button>-->
<!--										</form>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
</div>
<!-- Product templates backup -->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-01-1.jpg"-->
<!--						alt="Leather Pegged Pants"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--				<div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">-->
<!--					<i class="icon-palette">-->
<!--						<span class="path1"></span>-->
<!--						<span class="path2"></span>-->
<!--						<span class="path3"></span>-->
<!--						<span class="path4"></span>-->
<!--						<span class="path5"></span>-->
<!--						<span class="path6"></span>-->
<!--						<span class="path7"></span>-->
<!--						<span class="path8"></span>-->
<!--						<span class="path9"></span>-->
<!--						<span class="path10"></span>-->
<!--					</i>-->
<!--					<ul>-->
<!--						<li data-image="images/skins/fashion/products/product-01-1.jpg">-->
<!--							<a-->
<!--									class="js-color-toggle"-->
<!--									data-toggle="tooltip"-->
<!--									data-placement="left"-->
<!--									title="Color Name"-->
<!--							>-->
<!--								<img-->
<!--										src="images/colorswatch/color-orange.png"-->
<!--										alt=""-->
<!--								>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li data-image="images/skins/fashion/products/product-01-color-2.jpg">-->
<!--							<a-->
<!--									class="js-color-toggle"-->
<!--									data-toggle="tooltip"-->
<!--									data-placement="left"-->
<!--									title="Color Name"-->
<!--							>-->
<!--								<img-->
<!--										src="images/colorswatch/color-black.png"-->
<!--										alt=""-->
<!--								>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li data-image="images/skins/fashion/products/product-01-color-3.jpg">-->
<!--							<a-->
<!--									class="js-color-toggle"-->
<!--									data-toggle="tooltip"-->
<!--									data-placement="left"-->
<!--									title="Color Name"-->
<!--							>-->
<!--								<img-->
<!--										src="images/colorswatch/color-red.png"-->
<!--										alt=""-->
<!--								>-->
<!--							</a>-->
<!--						</li>-->
<!--					</ul>-->
<!--				</div>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-01-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-01-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-01-2.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-01-2.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-01-3.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-01-3.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">FOXic</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Leather Pegged Pants</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Leather Pegged Pants", "path":"images/skins/fashion/products/product-01-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Leather Pegged Pants", "path":"images/skins/fashion/products/product-01-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-02-1.jpg"-->
<!--						alt="Oversize Cotton Dress"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--				<div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">-->
<!--					<i class="icon-palette">-->
<!--						<span class="path1"></span>-->
<!--						<span class="path2"></span>-->
<!--						<span class="path3"></span>-->
<!--						<span class="path4"></span>-->
<!--						<span class="path5"></span>-->
<!--						<span class="path6"></span>-->
<!--						<span class="path7"></span>-->
<!--						<span class="path8"></span>-->
<!--						<span class="path9"></span>-->
<!--						<span class="path10"></span>-->
<!--					</i>-->
<!--					<ul>-->
<!--						<li data-image="images/skins/fashion/products/product-02-1.jpg">-->
<!--							<a-->
<!--									class="js-color-toggle"-->
<!--									data-toggle="tooltip"-->
<!--									data-placement="left"-->
<!--									title="Color Name"-->
<!--							>-->
<!--								<img-->
<!--										src="images/colorswatch/color-orange.png"-->
<!--										alt=""-->
<!--								>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li data-image="images/skins/fashion/products/product-02-color-2.jpg">-->
<!--							<a-->
<!--									class="js-color-toggle"-->
<!--									data-toggle="tooltip"-->
<!--									data-placement="left"-->
<!--									title="Color Name"-->
<!--							>-->
<!--								<img-->
<!--										src="images/colorswatch/color-red.png"-->
<!--										alt=""-->
<!--								>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li data-image="images/skins/fashion/products/product-02-color-3.jpg">-->
<!--							<a-->
<!--									class="js-color-toggle"-->
<!--									data-toggle="tooltip"-->
<!--									data-placement="left"-->
<!--									title="Color Name"-->
<!--							>-->
<!--								<img-->
<!--										src="images/colorswatch/color-yellow.png"-->
<!--										alt=""-->
<!--								>-->
<!--							</a>-->
<!--						</li>-->
<!--					</ul>-->
<!--				</div>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-02-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-02-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-02-2.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-02-2.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-02-3.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-02-3.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">Seiko</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Oversize Cotton Dress</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Oversize Cotton Dress", "path":"images/skins/fashion/products/product-02-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Oversize Cotton Dress", "path":"images/skins/fashion/products/product-02-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-03-1.jpg"-->
<!--						alt="Oversized Cotton Blouse"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!--					<div class="label-new">-->
<!--						<span>New</span>-->
<!--					</div>-->
<!---->
<!---->
<!--					<div class="label-sale">-->
<!--						<span>-10% <span class="sale-text">Sale</span></span>-->
<!---->
<!--						<div class="countdown-circle">-->
<!--							<div-->
<!--									class="countdown js-countdown"-->
<!--									data-countdown="2021/07/01"-->
<!--							></div>-->
<!--						</div>-->
<!---->
<!--					</div>-->
<!---->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-03-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-03-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-03-2.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-03-2.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-03-3.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-03-3.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">Banita</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Oversized Cotton Blouse</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-old">$ 200</div>-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-04-1.jpg"-->
<!--						alt="Suede Leather Mini Skirt"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-04-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-04-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-04-2.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-04-2.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-04-3.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-04-3.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">Bigsteps</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Suede Leather Mini Skirt</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Suede Leather Mini Skirt", "path":"images/skins/fashion/products/product-04-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Suede Leather Mini Skirt", "path":"images/skins/fashion/products/product-04-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-05-1.jpg"-->
<!--						alt="Cotton T-shirt"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-05-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-05-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-05-2.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-05-2.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-05-3.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-05-3.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">FOXic</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Cotton T-shirt</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Cotton T-shirt", "path":"images/skins/fashion/products/product-05-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Cotton T-shirt", "path":"images/skins/fashion/products/product-05-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-06-1.jpg"-->
<!--						alt="Midi Dress with Belt"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--				<div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">-->
<!--					<i class="icon-palette">-->
<!--						<span class="path1"></span>-->
<!--						<span class="path2"></span>-->
<!--						<span class="path3"></span>-->
<!--						<span class="path4"></span>-->
<!--						<span class="path5"></span>-->
<!--						<span class="path6"></span>-->
<!--						<span class="path7"></span>-->
<!--						<span class="path8"></span>-->
<!--						<span class="path9"></span>-->
<!--						<span class="path10"></span>-->
<!--					</i>-->
<!--					<ul>-->
<!--						<li data-image="images/skins/fashion/products/product-06-1.jpg">-->
<!--							<a-->
<!--									class="js-color-toggle"-->
<!--									data-toggle="tooltip"-->
<!--									data-placement="left"-->
<!--									title="Color Name"-->
<!--							>-->
<!--								<img-->
<!--										src="images/colorswatch/color-grey.png"-->
<!--										alt=""-->
<!--								>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li data-image="images/skins/fashion/products/product-06-color-2.jpg">-->
<!--							<a-->
<!--									class="js-color-toggle"-->
<!--									data-toggle="tooltip"-->
<!--									data-placement="left"-->
<!--									title="Color Name"-->
<!--							>-->
<!--								<img-->
<!--										src="images/colorswatch/color-green.png"-->
<!--										alt=""-->
<!--								>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li data-image="images/skins/fashion/products/product-06-color-3.jpg">-->
<!--							<a-->
<!--									class="js-color-toggle"-->
<!--									data-toggle="tooltip"-->
<!--									data-placement="left"-->
<!--									title="Color Name"-->
<!--							>-->
<!--								<img-->
<!--										src="images/colorswatch/color-black.png"-->
<!--										alt=""-->
<!--								>-->
<!--							</a>-->
<!--						</li>-->
<!--					</ul>-->
<!--				</div>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-06-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-06-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-06-2.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-06-2.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-06-3.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-06-3.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">Seiko</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Midi Dress with Belt</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-outstock">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-07-1.jpg"-->
<!--						alt="Denim Mini Skirt"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--					<div class="label-outstock">-->
<!--						<span>Sold Out</span>-->
<!--					</div>-->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-07-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-07-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">Banita</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Denim Mini Skirt</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Denim Mini Skirt", "path":"images/skins/fashion/products/product-07-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Denim Mini Skirt", "path":"images/skins/fashion/products/product-07-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-08-1.jpg"-->
<!--						alt="Peg Leg Trousers"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--					<div class="label-sale">-->
<!--						<span>-10% <span class="sale-text">Sale</span></span>-->
<!---->
<!--						<div class="countdown-circle">-->
<!--							<div-->
<!--									class="countdown js-countdown"-->
<!--									data-countdown="2021/07/01"-->
<!--							></div>-->
<!--						</div>-->
<!---->
<!--					</div>-->
<!---->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-08-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-08-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-08-2.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-08-2.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-08-3.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-08-3.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">FOXic</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Peg Leg Trousers</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Peg Leg Trousers", "path":"images/skins/fashion/products/product-08-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-old">$ 200</div>-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Peg Leg Trousers", "path":"images/skins/fashion/products/product-08-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-09-1.jpg"-->
<!--						alt="Skinny Jeans"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!--					<div class="label-new">-->
<!--						<span>New</span>-->
<!--					</div>-->
<!---->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-09-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-09-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-09-2.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-09-2.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-09-3.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-09-3.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">FOXic</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Skinny Jeans</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Skinny Jeans", "path":"images/skins/fashion/products/product-09-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Skinny Jeans", "path":"images/skins/fashion/products/product-09-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-10-1.jpg"-->
<!--						alt="Short Sleeve Blouse"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--					<div class="label-sale">-->
<!--						<span>-10% <span class="sale-text">Sale</span></span>-->
<!---->
<!--						<div class="countdown-circle">-->
<!--							<div-->
<!--									class="countdown js-countdown"-->
<!--									data-countdown="2021/07/01"-->
<!--							></div>-->
<!--						</div>-->
<!---->
<!--					</div>-->
<!---->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-10-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-10-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-10-2.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-10-2.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-10-3.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-10-3.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">FOXic</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Short Sleeve Blouse</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Short Sleeve Blouse", "path":"images/skins/fashion/products/product-10-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-old">$ 200</div>-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Short Sleeve Blouse", "path":"images/skins/fashion/products/product-10-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-11-1.jpg"-->
<!--						alt="Jogger Lounge Pants"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--					<div class="label-sale">-->
<!--						<span>-10% <span class="sale-text">Sale</span></span>-->
<!---->
<!--						<div class="countdown-circle">-->
<!--							<div-->
<!--									class="countdown js-countdown"-->
<!--									data-countdown="2021/07/01"-->
<!--							></div>-->
<!--						</div>-->
<!---->
<!--					</div>-->
<!---->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-11-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-11-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-11-2.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-11-2.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-11-3.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-11-3.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">FOXic</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Jogger Lounge Pants</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Jogger Lounge Pants", "path":"images/skins/fashion/products/product-11-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-old">$ 200</div>-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Jogger Lounge Pants", "path":"images/skins/fashion/products/product-11-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">-->
<!--	<div class="prd-inside">-->
<!--		<div class="prd-img-area">-->
<!--			<a-->
<!--					href="product.html"-->
<!--					class="prd-img image-hover-scale image-container"-->
<!--			>-->
<!--				<img-->
<!--						src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--						data-src="images/skins/fashion/products/product-12-1.jpg"-->
<!--						alt="Elastic Cuff Joggers Pants"-->
<!--						class="js-prd-img lazyload fade-up"-->
<!--				>-->
<!--				<div class="foxic-loader"></div>-->
<!--				<div class="prd-big-squared-labels">-->
<!---->
<!---->
<!--					<div class="label-sale">-->
<!--						<span>-10% <span class="sale-text">Sale</span></span>-->
<!---->
<!--						<div class="countdown-circle">-->
<!--							<div-->
<!--									class="countdown js-countdown"-->
<!--									data-countdown="2021/07/01"-->
<!--							></div>-->
<!--						</div>-->
<!---->
<!--					</div>-->
<!---->
<!---->
<!--				</div>-->
<!--			</a>-->
<!--			<div class="prd-circle-labels">-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--						title="Add To Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-stroke"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--						title="Remove From Wishlist"-->
<!--				>-->
<!--					<i class="icon-heart-hover"></i>-->
<!--				</a>-->
<!--				<a-->
<!--						href="#"-->
<!--						class="circle-label-qview js-prd-quickview prd-hide-mobile"-->
<!--						data-src="ajax/ajax-quickview.html"-->
<!--				>-->
<!--					<i class="icon-eye"></i>-->
<!--					<span>QUICK VIEW</span>-->
<!--				</a>-->
<!---->
<!--			</div>-->
<!---->
<!--			<ul class="list-options color-swatch">-->
<!--				<li-->
<!--						data-image="images/skins/fashion/products/product-12-1.jpg"-->
<!--						class="active"-->
<!--				>-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-12-1.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-12-2.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-12-2.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--				<li data-image="images/skins/fashion/products/product-12-3.jpg">-->
<!--					<a-->
<!--							href="#"-->
<!--							class="js-color-toggle"-->
<!--							data-toggle="tooltip"-->
<!--							data-placement="right"-->
<!--							title="Color Name"-->
<!--					>-->
<!--						<img-->
<!--								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="-->
<!--								data-src="images/skins/fashion/products/product-12-3.jpg"-->
<!--								class="lazyload fade-up"-->
<!--								alt="Color Name"-->
<!--						>-->
<!--					</a>-->
<!--				</li>-->
<!---->
<!---->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--		<div class="prd-info">-->
<!--			<div class="prd-info-wrap">-->
<!--				<div class="prd-info-top">-->
<!--					<div class="prd-rating">-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--						<i class="icon-star-fill fill"></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-rating justify-content-center">-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--					<i class="icon-star-fill fill"></i>-->
<!--				</div>-->
<!--				<div class="prd-tag">-->
<!--					<a href="#">FOXic</a>-->
<!--				</div>-->
<!--				<h2 class="prd-title">-->
<!--					<a href="product.html">Elastic Cuff Joggers Pants</a>-->
<!--				</h2>-->
<!--				<div class="prd-description">-->
<!--					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad-->
<!--					litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante-->
<!--					sed lacinia.-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<form action="#">-->
<!--						<button-->
<!--								class="btn js-prd-addtocart"-->
<!--								data-product='{"name": "Elastic Cuff Joggers Pants", "path":"images/skins/fashion/products/product-12-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--						>Add To Cart-->
<!--						</button>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="prd-hovers">-->
<!--				<div class="prd-circle-labels">-->
<!--					<div>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"-->
<!--								title="Add To Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-stroke"></i>-->
<!--						</a>-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"-->
<!--								title="Remove From Wishlist"-->
<!--						>-->
<!--							<i class="icon-heart-hover"></i>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="prd-hide-mobile">-->
<!--						<a-->
<!--								href="#"-->
<!--								class="circle-label-qview js-prd-quickview"-->
<!--								data-src="ajax/ajax-quickview.html"-->
<!--						>-->
<!--							<i class="icon-eye"></i>-->
<!--							<span>QUICK VIEW</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="prd-price">-->
<!---->
<!--					<div class="price-old">$ 200</div>-->
<!---->
<!--					<div class="price-new">$ 180</div>-->
<!--				</div>-->
<!--				<div class="prd-action">-->
<!--					<div class="prd-action-left">-->
<!--						<form action="#">-->
<!--							<button-->
<!--									class="btn js-prd-addtocart"-->
<!--									data-product='{"name": "Elastic Cuff Joggers Pants", "path":"images/skins/fashion/products/product-12-1.jpg", "url":"product.html", "aspect_ratio":0.778}'-->
<!--							>Add To Cart-->
<!--							</button>-->
<!--						</form>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<script src="/js/category.js"></script>
<script src="/js/cart.js"></script>
<?php include "footer.php"; ?>
<?php include "templates/category/category-product.php"; ?>
