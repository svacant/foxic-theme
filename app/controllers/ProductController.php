<?php
require_once __DIR__ . '/../core/View.php';
require_once __DIR__ . '/../../data.php';

class ProductController
{
    public function show(string $clearTitle): void
    {
        global $cache, $data, $shoppiPageId, $translations, $lang;

        if (!$product = $cache->get($clearTitle)) {
            $product = $data->request('https://www.shoppiapp.com/api/website/product/json?clear_title=' . $clearTitle);
        }

        if (!$product->title) {
            header('Location: /');
            exit;
        }

        $cache->set($clearTitle, $product);

        $keywords = array_filter(array_map('trim', explode(',', (string) $product->keywords)));

        View::render('product', [
            'data'        => $data,
            'product'     => $product,
            'keywords'    => $keywords,
            'shoppiPageId'=> $shoppiPageId,
            'year'        => date('Y'),
            'trans'       => $translations,
            'selected_en' => $lang === 'en' ? 'selected' : '',
            'selected_de' => $lang === 'de' ? 'selected' : '',
            'selected_it' => $lang === 'it' ? 'selected' : ''
        ]);
    }
}
