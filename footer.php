<footer class="page-footer footer-style-6 ">
    <div class="footer-top">
        <div class="container">
            <div class="row mt-0">
                <div class="col-lg col-xl last-mobile">
                    <div class="footer-block">
                        <div class="footer-logo">
                            <a href="index.html"><img class="lazyload fade-up" src="<? echo $data->photo; ?>"
                                                      alt="Logo"></a>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li>E-mail: <a href="mailto:service@nf-elektronik.com">service@nf-elektronik.com</a>
                                </li>
                                <!-- <li>Hours: 10:00 - 18:00, Mon - Fri</li> -->
                            </ul>
                        </div>
                        <ul class="social-list">
                            <li>
                                <a href="#" class="icon icon-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-google"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-vimeo"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-youtube"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-pinterest"></a>
                            </li>
                        </ul>
                        <!-- <div class="d-lg-none mt-3">
                            <div class="box-coupon">
                                <div class="box-coupon-icon"><i class="icon-scissors"></i></div>
                                <div class="box-coupon-text"><span class="custom-color">FOXIC</span> THEME</div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg col-xl">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Information</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li><a href="/impressum.html">Impressum</a></li>
                                <li><a href="/contact.html">Contact Us</a></li>
                                <li><a href="/datenschutzerklärung.html">Datenschutzerklärung</a></li>
                                <li><a href="/allgemeinegeschäftsbedingungen.html">Allgemeine Geschäftsbedingungen</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-xl">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Account details</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li><a href="/account-details.html">My Account</a></li>
                                <li><a href="/cart.html">View Cart</a></li>
                                <!-- <li><a href="account-wishlist.html">My Wishlist</a></li> -->
                                <li><a href="/account-history.html">Order Status</a></li>
                                <li><a href="/account-history.html">Track My Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-xl">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Safe payments</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul class="payment-link">
                                <li><i class="icon-google-pay-logo"></i></li>
                                <li><i class="icon-visa-pay-logo"></i></li>
                                <li><i class="icon-apple-pay-logo"></i></li>
                            </ul>
                        </div>
                        <!-- <div class="d-none d-lg-block">
                            <div class="box-coupon">
                                <div class="box-coupon-icon"><i class="icon-scissors"></i></div>
                                <div class="box-coupon-text"><span class="custom-color">FOXIC</span> THEME</div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom footer-bottom--bg">
        <div class="container">
            <div class="footer-copyright text-center">
                <a href="/">NF-ELEKTRONIK</a> ©2022 copyright
            </div>
        </div>
    </div>

</footer>

<div class="footer-sticky">

    <!--added to cart-->
    <div class="popup-addedtocart js-popupAddToCart closed" data-close="50000">
        <div class="container">
            <div class="row">
                <div class="popup-addedtocart-close js-popupAddToCart-close"><i class="icon-close"></i></div>
                <div class="popup-addedtocart-cart js-open-drop" data-panel="#dropdnMinicart"><i
                            class="icon-basket"></i></div>

                <div class="col popup-addedtocart_info">
                    <div class="row">
                        <a href="product.html" class="col-auto popup-addedtocart_image">
									<span class="image-container w-100">
										<img src="" alt=""/>
									</span>
                        </a>
                        <div class="col popup-addedtocart_text">
                            <a href="product.html" class="popup-addedtocart_title"></a>
                            <span class="popup-addedtocart_message">Added to <a href="/cart.html"
                                                                                class="underline">Cart</a></span>
                            <span class="popup-addedtocart_error_message"></span>
                        </div>
                    </div>
                </div>
                <div class="col-auto popup-addedtocart_actions">
                    <span>You can continue</span> <a href="/cart.html" class="btn btn--grey btn--sm"><i
                                class="icon-basket"></i><span>Check Cart</span></a> <span>or</span> <a
                            href="/checkout.html" class="btn btn--invert btn--sm"><i class="icon-envelope-1"></i><span>Check out</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- back to top -->
    <a class="back-to-top js-back-to-top compensate-for-scrollbar" href="#" title="Scroll To Top">
        <i class="icon icon-angle-up"></i>
    </a>
    <!-- loader -->
    <div class="loader-horizontal js-loader-horizontal">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
        </div>
    </div>
</div>
<!-- payment note -->
<div class="footer-sticky">
    <!-- <div class="payment-notification-wrap js-pn" data-visible-time="3000" data-hidden-time="3000" data-delay="500"
        data-from="Aberdeen,Bakersfield,Birmingham,Cambridge,Youngstown"
        data-products='[{"productname":"Leather Pegged Pants", "productlink":"product.html","productimage":"images/skins/fashion/products/product-01-1.jpg"},{"productname":"Black Fabric Backpack", "productlink":"product.html","productimage":"images/skins/fashion/products/product-28-1.jpg"},{"productname":"Combined Chunky Sneakers", "productlink":"product.html","productimage":"images/skins/fashion/products/product-23-1.jpg"}]'>
        <div class="payment-notification payment-notification--squared">
            <div class="payment-notification-inside">
                <div class="payment-notification-container">
                    <a href="#" class="payment-notification-image js-pn-link">
                    <img src="images/products/product-01.jpg" class="js-pn-image" alt="">
                    </a>
                    <div class="payment-notification-content-wrapper">
                        <div class="payment-notification-content">
                            <div class="payment-notification-text">Someone purchased</div>
                            <a href="product.html" class="payment-notification-name js-pn-name js-pn-link">Applewatch</a>
                            <div class="payment-notification-bottom">
                                <div class="payment-notification-when"><span class="js-pn-time">32</span> min ago</div>
                                <div class="payment-notification-from">from <span class="js-pn-from">Riverside</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment-notification-close"><i class="icon-close-bold"></i></div>
                <div class="payment-notification-qw prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i></div>
            </div>
        </div>
    </div> -->
</div>

<!-- <div id="popupNewsletter1" class="modal-info-content js-newslettermodal newslettermodal--classic p-0" style="display: none;" data-pause="12000" data-expires="0" data-only-index="false">
    <div class="row align-items-center">
        <div class="col-sm-8 d-none d-sm-block">
            <div class="popup-newsletter-image image-container" style="padding-bottom: 160.0%">
                <img class="lazyload w-100" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/popup-image.png" alt="">
            </div>
        </div>
        <div class="col-sm-10">
            <div class="popup-newsletter-content">
                <form method="post" action="#" class="newslettermodal-content-form">
                    <h3 class="newslettermodal-content-title">Be The First To Know</h3>
                    <div class="newslettermodal-content-text">About our newest arrivals, special offers plus 10% off on your first order.</div>
                    <div class="form-group mt-3">
                        <input type="hidden" name="contact[tags]" value="newsletter">
                        <div class="form-label">Email address</div>
                        <input type="email" name="contact[email]" class="form-control form-control--sm" value="" placeholder="Email address">
                    </div>
                    <button type="submit" class="btn w-100">Subscribe</button>
                    <div class="popup-newsletter-info-sm mt-2">By subscribing, you accept the <a href="#" class="modal-info-link" data-src="#agreementInfo">Terms of Use</a></div>
                </form>
            </div>
        </div>
    </div>
    <div data-fancybox-close class="fancybox-close-small modal-close"><i class="icon-close"></i></div>
</div> -->


<script id="show-category" type="text/x-handlebars-template">
    <li class="mmenu-item--mega">
        <a href="#">{{category}}</a>
        <div class="mmenu-submenu mmenu-submenu--has-bottom">
            <div class="mmenu-submenu-inside">
                <div class="container">
                    <div class="mmenu-left width-25">
                        <div class="mmenu-bnr-wrap">
                            <a href="#" class="image-hover-scale"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-srcset="{{photo}}" class="lazyload fade-up" alt=""></a>
                        </div>

                    </div>
                    <div class="mmenu-cols column-4">

                        {{#each categories}}
                        <div class="mmenu-col">
                            <h3 class="submenu-title"><a href="/categories/{{../category}}/{{@key}}">{{@key}}</a></h3>

                            <ul class="submenu-list">
                                {{#each this}}
                                {{#each this}}
                                <li><strong style="opacity:0.7;font-weight:700;">{{@key}}</strong></li>
                                {{#each this}}
                                <li><strong style="opacity:0.7;font-weight:700;">{{@key}}</strong></li>
                                <li><a href="{{getCategoryLink this @../key}}">{{@key}}</a></li>
                                {{else}}
                                <li><a href="{{getCategoryLink this @../key}}">{{@key}}</a></li>
                                {{/each}}
                                {{else}}
                                <li><a href="{{getCategoryLink this @../key}}">{{@key}}</a></li>
                                {{/each}}
                                {{else}}
                                <li><a href="{{getCategoryLink this @../key}}">{{@key}}</a></li>
                                {{/each}}
                            </ul>
                        </div>
                        {{/each}}
                        <div class="mmenu-bottom justify-content-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>

</script>

<script id="show-category-mobile" type="text/x-handlebars-template">
    <li>
        <a href="#">{{category}}<span class="arrow"><i class="icon-angle-right"></i></span></a>
        <ul class="nav-level-2">
            {{#each categories}}
            <li><strong style="opacity:0.7;font-weight:700;">{{@key}}</strong></li>
            {{#each this}}
            {{#each this}}
            <li><strong style="opacity:0.7;font-weight:700;">{{@key}}</strong></li>
            {{#each this}}
            <li><strong style="opacity:0.7;font-weight:700;">{{@key}}</strong></li>
            <li><a href="{{getCategoryLink this @../key}}">{{@key}}</a></li>
            {{else}}
            <li><a href="{{getCategoryLink this @../key}}">{{@key}}</a></li>
            {{/each}}
            {{else}}
            <li><a href="{{getCategoryLink this @../key}}">{{@key}}</a></li>
            {{/each}}
            {{else}}
            <li><a href="{{getCategoryLink this @../key}}">{{@key}}</a></li>
            {{/each}}
            {{/each}}
        </ul>
    </li>
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var allCategories = [];
        var links = [];

        Handlebars.registerHelper('getCategoryLink', function (category, parent) {
            let found = "";

            if (parent !== undefined) {
                found = links.filter(cat => cat.endsWith(category.trim()) && cat.includes(parent.trim()));
            } else {
                found = links.filter(cat => cat.endsWith(category.trim()));
            }

            const link = found[0].split('/');
            const mainCategory = link[0];

            let categoryId = "";
            $.each(allCategories, (i,cat) => {
                let categoryName = cat.category;
                if (categoryName.trim() == mainCategory.trim()) {
                    categoryId = cat.id;
                }
            });

            return `/category/${found[0]}/${categoryId}`;
        });

        var context = $.get("https://www.shoppiapp.com/api/website/listCategories/json?pageId=10587&limit=20", function (data) {

            /*
             Retrieve the template data from the HTML (jQuery is used here).
            */
            var template = $('#show-category').html();

            allCategories = data.categories;
            window.localStorage.setItem('categories', JSON.stringify(allCategories));
            const headerCategories = data.categories.slice(0, 6);

            const recursive = (parentCategoryLink, categories) => {
                $.each(categories, (categoryName, subCategories) => {
                    if (typeof subCategories === 'string') {
                        links.push(`${parentCategoryLink}/${subCategories.trim()}`);
                    } else {
                        recursive(`${parentCategoryLink}/${categoryName.trim()}`, subCategories);
                    }
                })
            };

            $.each(allCategories, (key,value) => {
                links.push(value.category);
                $.each(value.categories, (childKey, childValues) => {
                    if (typeof childValues === 'string') {
                        links.push(`${value.category.trim()}/${childValues.trim()}`);
                    } else {
                        recursive(`${value.category.trim()}/${childKey.trim()}`, childValues);
                    }
                });
            });


            $.each(headerCategories, function (i) {
                // Compile the template data into a function
                var templateScript = Handlebars.compile(template);

                var html = templateScript(data.categories[i]);

                // Insert the HTML code into the page
                $('.list-categories').each((index, element) => {
                    $(element).append(html);
                });
            });

            // Retrieve the template data from the HTML (jQuery is used here).
            var template = $('#show-category-mobile').html();

            $.each(data.categories, function (i) {

                // Compile the template data into a function
                var templateScript = Handlebars.compile(template);

                var html = templateScript(data.categories[i]);

                // Insert the HTML code into the page
                $('.list-categories-mobile').each((index, element) => {
                    $(element).append(html);
                });
            });

            $('.mobilemenu-toggle').on('click', function () {
                $('.nav-wrapper').css({
                    "height": $('.nav-wrapper .nav-level-1').outerHeight()
                });
            });
        }, 'json');

    });

</script>

<script src="/js/vendor-special/lazysizes.min.js"></script>
<script src="/js/vendor-special/ls.bgset.min.js"></script>
<script src="/js/vendor-special/ls.aspectratio.min.js"></script>
<script src="/js/vendor-special/jquery.ez-plus.js"></script>
<script src="/js/vendor-special/instafeed.min.js"></script>
<script src="/js/vendor/vendor.min.js"></script>
<script src="/js/app-html.js"></script>
<script src="/js/search.js?v3.0"></script>
<script src="/js/handlebars.min-v4.7.7.js"></script>
<script src="/js/header.js"></script>
