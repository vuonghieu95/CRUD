<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/25/2018
 * Time: 11:03 PM
 */

$con = new PDO('mysql:host=localhost; dbname=mydb', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->exec("set names utf8");

$display = 5; // so hang hien thi tren 1 trang
//$num_links = 5;
$result = $con->query('SELECT id as total FROM `tbl-sv`');
$total_rows = $result ->rowCount();
$curr_page=isset($_GET['page'])? $_GET['page']:1;

$position = (($curr_page - 1) * $display);

$total_pages = ceil($total_rows /5);

    $start = 1;

    $end = $total_pages;
    return $position;

?>



