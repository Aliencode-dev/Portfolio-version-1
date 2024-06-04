<?php
function get_projects($conn){
    $sql = "SELECT * FROM project_sub";
    $data = mysqli_query($conn, $sql);
    return $data;
}

function get_project($conn, $id){
    $sql = "SELECT * FROM project_sub WHERE sub_id=$id";
    $data = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($data);
    return $data;
}

function get_wireframe($conn, $id){
    $sql = "SELECT wireframe_link FROM wireframe_images WHERE sub_project_id=$id";
    $data = mysqli_query($conn, $sql);
    return $data;
}

function get_mockup($conn, $id){
    $sql = "SELECT mockup_link FROM mockup_images WHERE sub_project_id=$id";
    $data = mysqli_query($conn, $sql);
    return $data;
}