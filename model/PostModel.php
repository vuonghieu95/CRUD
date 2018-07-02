<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/28/2018
 * Time: 6:59 PM
 */
class PostModel
{
    public function getConnect()
    {
        $con = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    }

    public function getResults($id)
    {
        $con = $this->getConnect();

        $results = "SELECT * FROM `tbl-sv` where id ='$id'";
        $con->query($results);
        return $results;
    }

    public function del($id, $a, $b, $c)
    {
        try {
            $con = $this->getConnect();
            $results = $this->getResults();
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $a = isset($_POST['name']) ? $_POST['name'] : '';
            $b = isset($_POST['phone']) ? $_POST['phone'] : '';
            $c = isset($_POST['email']) ? $_POST['email'] : '';
            $sql = "DELETE FROM `tbl-sv` WHERE id = '$id'";
            $con->exec($sql);

            return $results;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    //search
    public function search(){
        include('config.php');
        $search = isset($_GET['name_search']) ? $_GET['name_search'] : '';
        $sqlSearch = "SELECT * FROM `tbl-sv` WHERE name LIKE '%$search%'|| phone LIKE '%$search%'||email LIKE '%$search%'  ORDER BY 'id' ASC LIMIT $position, $display  ";
   return $sqlSearch;
    }


} ?>
