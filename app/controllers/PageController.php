<?php
require_once __DIR__ . '/../core/View.php';
require_once __DIR__ . '/../../data.php';

class PageController
{
    public function show(string $clearTitle): void
    {
        global $data, $shoppiPageId, $translations, $lang;

        $page = $data->request('https://www.shoppiapp.com/api/website/page/json?clear_title=' . $clearTitle);

        View::render('page', [
            'data'        => $data,
            'page'        => $page,
            'shoppiPageId'=> $shoppiPageId,
            'year'        => date('Y'),
            'trans'       => $translations,
            'selected_en' => $lang === 'en' ? 'selected' : '',
            'selected_de' => $lang === 'de' ? 'selected' : '',
            'selected_it' => $lang === 'it' ? 'selected' : ''
        ]);
    }
}
