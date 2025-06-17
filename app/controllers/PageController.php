<?php
require_once __DIR__ . '/../core/View.php';
require_once __DIR__ . '/../../data.php';

class PageController
{
    public function show(string $clearTitle): void
    {
        global $data, $shoppiPageId;

        $page = $data->request('https://www.shoppiapp.com/api/website/page/json?clear_title=' . $clearTitle);

        View::render('page', [
            'data'        => $data,
            'page'        => $page,
            'sections'    => $data->sections(),
            'shoppiPageId'=> $shoppiPageId,
            'year'        => date('Y')
        ]);
    }
}
