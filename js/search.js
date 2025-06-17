$(document).ready(function() {
    const params = new URLSearchParams(window.location.search);
    const initialQuery = params.get('q') || '';
    const initialMin = params.get('min') || '';
    const initialMax = params.get('max') || '';

    $('#search-field').val(initialQuery);
    $('#min-price').val(initialMin);
    $('#max-price').val(initialMax);

    const loadResults = () => {
        const query = $('#search-field').val();
        const min = $('#min-price').val();
        const max = $('#max-price').val();
        let url = `/plugins/search.php?q=${encodeURIComponent(query)}`;
        if (min) {
            url += `&min=${min}`;
        }
        if (max) {
            url += `&max=${max}`;
        }

        $.get(url, function(data) {
            const grid = $('#search-results');
            const template = $('#search-product').html();
            grid.empty();

            if (data.products) {
                $.each(data.products, function(i, product) {
                    const templateScript = Handlebars.compile(template);
                    const html = templateScript(product);
                    grid.append(html);
                });
            }
        }, 'json');
    };

    $('#search-form').on('submit', function(e) {
        e.preventDefault();
        loadResults();
    });

    if (initialQuery) {
        loadResults();
    }
});
