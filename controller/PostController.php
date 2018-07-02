<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/28/2018
 * Time: 6:59 PM
 */
require_once('model/PostModel.php');
require_once('view/PostView.php');

class PostController
{
    public function getPost()
    {
        $postView = new PostView();
        $postView->showPost();
    }
    public function getResults()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $postModel = new PostModel();
        $postModel = new PostModel();
        $postModel->getResults($id);
        return $postModel->getResults($id);
    }

    public function addController(){
        $id = isset($_POST['id']) ? $_POST['id'] : '';

        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $postModel = new PostModel();
        $postModel ->add($name,$phone,$email);
    }

    public function editController(){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $postModel = new PostModel();
        $postModel ->edit($id,$name,$phone,$email);
    }

    public function del()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';

        $a = isset($_POST['name']) ? $_POST['name'] : '';
        $b = isset($_POST['phone']) ? $_POST['phone'] : '';
        $c = isset($_POST['email']) ? $_POST['email'] : '';

        $postModel = new PostModel();

        $postModel->del($id, $a, $b, $c);

    }

    public function search()
    {
        require_once('model/PostModel.php');
        $postModel = new PostModel();
        $postModel->search();
        return $postModel->search();
    }

    public function countSearch()
    {
        require_once('model/PostModel.php');
        $postModel = new PostModel();
        $postModel->countSearch();
        return $postModel;
    }


}