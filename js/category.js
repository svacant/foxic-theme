$(document).ready(() => {
    const location = window.location.href;
    const splitLink = location.split("/");
    const categoryId = splitLink[splitLink.length-1];
    const categoryName = splitLink[splitLink.length-2];

    if (!categoryId) {
        //TODO: 404
    }

    $("#categoryTitle").html(decodeURIComponent(categoryName));

    let skip = 0;
    let reachedEnd = false;

    function reinit() {
        const w = window.innerWidth || $window.width();
        const maxMD = 992;
        const $products = $('.js-category-grid');
        const horizontalClass = 'prd-horgrid';
        const $list = $('.js-listview', $('.view-mode'));
        const $horGrid = $('.js-horview', $('.view-mode'));

        if (w < maxMD) {
            if ($products.hasClass(horizontalClass)) {
                $list.trigger('click');
                $products.addClass('js-temp-horview-d');
            }
        } else {
            if ($products.hasClass('js-temp-horview-d')) {
                $horGrid.trigger('click');
                $products.removeClass('js-temp-horview-d');
            }
        }
    }

    const loadProducts = (cb) => {
        if (reachedEnd) {
            return;
        }

        $.get(`https://www.shoppiapp.com/api/website/listSells/json?parent=${categoryId}&limit=6&skip=${skip}`).then(response => {
            const products = response.sells;
            const grid = $("#category-products-grid");
            const template = $("#category-product").html();

            let currentItemCount = parseInt($('.items-count').html());
            $('.items-count').html(currentItemCount + products.length);

            if (products.length === 0) {
                reachedEnd = true;
            }

            $.each(products, function (i) {
                // Compile the template data into a function
                const templateScript = Handlebars.compile(template);
                const html = templateScript(products[i]);

                grid.append(html);
            });

            skip += 6;
            cb();
            reinit();
        });
    };

    loadProducts();

    let scrollLoad = true;
    $(window).on("scroll", function () {
        if (($(window).scrollTop() >= $(document).height() - $(window).height() - 300) && scrollLoad) {
            $('#view_more_products').click();
        }
    });

    $("#view_more_products").on('click', e => {
        scrollLoad = false;
        loadProducts(() => {
            scrollLoad = true;
        });
    });
});
