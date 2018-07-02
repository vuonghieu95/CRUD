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

    public function add($name, $phone, $email)
    {
        $con = $this->getConnect();
        $sql = "INSERT INTO `tbl-sv` (name, phone, email) VALUES ('" . $name . "','" . $phone . "','" . $email . "')";
        $con->exec($sql);
    }

    public function getResults($id)
    {
        $con = $this->getConnect();
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $results = "SELECT * FROM `tbl-sv` where id ='$id'";
       $data= $con->query($results);
        return $data;
    }

    public function edit($id,$name,$phone,$email){
        $con= $this ->getConnect();
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $sql = "UPDATE `tbl-sv` SET  name ='" . $name . "',phone='" . $phone . "',email='" . $email . "' WHERE id ='$id';";
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }
    public function del($id, $a, $b, $c)
    {

            $con = $this->getConnect();
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $sql = "DELETE FROM `tbl-sv` WHERE id = '$id'";
            $con->exec($sql);


    }

    //search
    public function search()
    {
        include 'config.php';
        $con = $this->getConnect();
        $search = isset($_GET['name_search']) ? $_GET['name_search'] : '';
        $sqlSearch = "SELECT * FROM `tbl-sv` WHERE name LIKE '%$search%'|| phone LIKE '%$search%'||email LIKE '%$search%'  ORDER BY 'id' ASC LIMIT $position, $display  ";
        $data = $con->query($sqlSearch);
        return $data;
    }

    public function countSearch()
    {
        include 'config.php';
        $con = $this->getConnect();
        $this->search();
        $search = isset($_GET['name_search']) ? $_GET['name_search'] : '';
        $sqlSearch = "SELECT * FROM `tbl-sv` WHERE name LIKE '%$search%'|| phone LIKE '%$search%'||email LIKE '%$search%'  ORDER BY 'id' ASC LIMIT $position, $display  ";
        $data = $con->query($sqlSearch);
        $sqlCount = "SELECT * FROM `tbl-sv` WHERE name LIKE '%$search%' ";
        $count = $con->query($sqlCount)->rowCount();
        return $count;
    }
} ?>
