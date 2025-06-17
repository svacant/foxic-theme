<?php
require_once __DIR__ . '/../core/View.php';
require_once __DIR__ . '/../../data.php';

class HomeController
{
    public function index(): void
    {
        global $data, $shoppiPageId, $translations, $lang;

        $sliderPath = './fotos/slider/';
        $sliderFiles = array_values(array_diff(scandir($sliderPath), ['.', '..']));

        $brandPath = './fotos/marken/';
        $brandFiles = [];
        if (is_dir($brandPath)) {
            $brandFiles = array_values(array_diff(scandir($brandPath), ['.', '..']));
        }

        View::render('home', [
            'data'        => $data,
            'shoppiPageId'=> $shoppiPageId,
            'sliderFiles' => $sliderFiles,
            'brands'      => $brandFiles,
            'year'        => date('Y'),
            'trans'       => $translations,
            'selected_en' => $lang === 'en' ? 'selected' : '',
            'selected_de' => $lang === 'de' ? 'selected' : '',
            'selected_it' => $lang === 'it' ? 'selected' : ''
        ]);
    }
}
