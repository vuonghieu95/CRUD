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
    public function conn()
    {
        $postModel = new PostModel();
        $postModel = new PostModel();
        $postModel->getConnect();

    }
    public function getResults(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $a = isset($_POST['name']) ? $_POST['name'] : '';
        $b = isset($_POST['phone']) ? $_POST['phone'] : '';
        $c = isset($_POST['email']) ? $_POST['email'] : '';
        $postModel = new PostModel();
        $postModel = new PostModel();
        $postModel->getResults($id);
    }

    public function del()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        var_dump($id);
        $a = isset($_POST['name']) ? $_POST['name'] : '';
        $b = isset($_POST['phone']) ? $_POST['phone'] : '';
        $c = isset($_POST['email']) ? $_POST['email'] : '';

        $postModel = new PostModel();
        $postModel->getResults();
        $postModel->del($id, $a, $b, $c);

    }
    public function search(){
        require_once('model/PostModel.php');
        $postModel = new PostModel();
$postModel ->search();
    }

}