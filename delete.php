<?php

$con = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$results = "SELECT * FROM `tbl-sv` where id ='$id'";
$con->query($results);
?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $a = isset($_POST['name']) ? $_POST['name'] : '';
        $b = isset($_POST['phone']) ? $_POST['phone'] : '';
        $c = isset($_POST['email']) ? $_POST['email'] : '';
        $sql = "DELETE FROM `tbl-sv` WHERE id = '$id'";
        $con->exec($sql);
        header('Location: index.php');
    } catch (PDOException $e) {
        $e->getMessage();
    }
//    require_once('model/PostModel.php');
//
//
//    require_once('controller/PostController.php');
//    $postController = new PostController();
//

    header('Location: index.php');
}
?>

<?php
require_once('view/temp/header.php');
?>

<div class="main baongoai">
    <div class="container">
        <h1 class="w3ls">DELETE</h1>
        <div class="content-w3ls">

            <div class="row">
                <div class="col-md-6">
                    <div class="content-agile1">
                        <h2 class="agileits1"></h2>
                        <p class="agileits2"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-agile2">
                        <form class="delete" method="post">
                            <div>
<!--                                --><?php //require_once('controller/PostController.php');
//                                $postController = new PostController();
//                                $con = $postController->conn();
//                                $results = $postController->getResults();
//
//                                ?>
                                <?php foreach ($con->query($results) as $row): ?>
                                    <?php
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $phone = $row['phone'];
                                    $email = $row['email']; ?>
<!--                                    --><?php //require_once('controller/PostController.php');
//                                    $postController = new PostController();
//                                    $postController->del();
//                                    ?>
                                    <div class="form-control2 w3layouts">
                                        <input style="margin-top:20px " type="hidden" name="id"
                                               value="<?php echo $id ?>" readonly/><br/><br>
                                    </div>

                                    <div class="form-control2 w3layouts">
                                        <label style="color: #FFFFFF">NAME:</label>
                                        <input type="text" name="name" value="<?php echo $name ?>" readonly/><br/><br>

                                    </div>

                                    <div class="form-control2 w3layouts">
                                        <label style="color: #FFFFFF">PHONE:</label>
                                        <input type="text" name="phone" value="<?php echo $phone ?>" readonly/><br/><br>


                                    </div>

                                    <div class="form-control2 w3layouts agileinfo">
                                        <label style="color: #FFFFFF">EMAIL:</label>
                                        <input type="text" name="email" value="<?php echo $email ?>" readonly/><br/><br>

                                    </div>
                                    <p class="bcccmn">Are you sure?</p>
                                    <input type="submit" class="register" name="submit" value="YES">
                                    <a style="    border-radius: 20px;border: 1px solid #286fc2; padding: 6px 133px; margin-left: 17px; font-size: 22px; color: white; background: #3970b0;"
                                       class="delete-cancel" href="index.php">Cancel</a>
                                <?php endforeach; ?>

                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


</body>
</html>

