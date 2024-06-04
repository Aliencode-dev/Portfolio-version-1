<?php

use Twig\Cache\FilesystemCache;
use Twig\Loader\FilesystemLoader;

include 'inc/config.php';
include 'inc/function.php';
require_once("Twig/lib/Twig/Autoloader.php");
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('./alien');

$twig = new Twig_Environment($loader);

$data = get_projects($conn);
$list = [];
while ($idata = mysqli_fetch_array($data)){
    $image_path = './alien' . $idata['banner_images'];
    $pre_list = [];
    if (file_exists($image_path)) {
        $pre_list['banner'] = $idata['banner_images'];
        $pre_list['name'] = $idata['name'];
        $pre_list['des'] = $idata['sub_infos'];
        $pre_list['id'] = $idata['sub_id'];
    
        array_push($list, $pre_list);
    }
}

$data_array = array();
$data_array['list'] = $list;

echo $twig->render("main.html", $data_array);