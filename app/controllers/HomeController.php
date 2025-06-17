<?php
require_once __DIR__ . '/../core/View.php';
require_once __DIR__ . '/../../data.php';

class HomeController
{
    public function index(): void
    {
        global $data, $shoppiPageId;

        $sliderPath = './fotos/slider/';
        $sliderFiles = array_values(array_diff(scandir($sliderPath), ['.', '..']));

        $brandPath = './fotos/marken/';
        $brandFiles = [];
        if (is_dir($brandPath)) {
            $brandFiles = array_values(array_diff(scandir($brandPath), ['.', '..']));
        }

        View::render('home', [
            'data'        => $data,
            'sections'    => $data->sections(),
            'shoppiPageId'=> $shoppiPageId,
            'sliderFiles' => $sliderFiles,
            'brands'      => $brandFiles,
            'year'        => date('Y')
        ]);
    }
}
