<?php
include './inc/config.php';
include './inc/function.php';
require_once("Twig/lib/Twig/Autoloader.php");
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('./alien');
$twig = new Twig_Environment($loader);

$id = $_GET['id'];
$data = get_project($conn, $id);
$mockup_data = get_mockup($conn, $id);
$wireframe_data = get_wireframe($conn, $id);

$mockup_array = [];
$wireframe_array = [];

while ($get_mockup_data = mysqli_fetch_array($mockup_data)){
    array_push($mockup_array, $get_mockup_data['mockup_link']);
}

while ($get_wireframe_data = mysqli_fetch_array($wireframe_data)){
    array_push($wireframe_array, $get_wireframe_data['wireframe_link']);
}

$data_array = array();
$data_array['banner'] = $data['banner_images'];
$data_array['name'] = $data['name'];
$data_array['des'] = $data['sub_infos'];
$data_array['id'] = $data['sub_id'];
$data_array['link'] = $data['link'];
$data_array['git_link'] = $data['github_link'];
$data_array['pdf_link'] = $data['pdf_link'];
$data_array['mockups'] = $mockup_array;
$data_array['wireframes'] = $wireframe_array;

echo $twig->render("project.html", $data_array);