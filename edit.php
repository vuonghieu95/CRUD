<?php
$con = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$results = "SELECT * FROM `tbl-sv` where id ='$id'";
$con->query($results);
?>
<?php
$nameErr = $emailErr = $phoneErr = "";
$name = $email = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["phone"])) {

        $phoneErr = "Phone is required";

    } else {
        $phone = $_POST["phone"];
    }

    if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["phone"])) {

    } else {
        try {
            $d = isset($_POST['id']) ? $_POST['id'] : '';
            $a = isset($_POST['name']) ? $_POST['name'] : '';
            $b = isset($_POST['phone']) ? $_POST['phone'] : '';
            $c = isset($_POST['email']) ? $_POST['email'] : '';
            $sql = "UPDATE `tbl-sv` SET  name ='" . $a . "',phone='" . $b . "',email='" . $c . "' WHERE id ='$d';";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            header('Location: index.php');
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}
require_once('view/temp/header.php'); ?>
<div class="main baongoai">
    <div class="container">
        <h1 class="w3ls">EDIT</h1>
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
                        <form class="edit" method="post" style="text-align: center">
                            <div>
                                <?php foreach ($con->query($results) as $row): ?>
                                    <?php
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $phone = $row['phone'];
                                    $email = $row['email']; ?>
                                    <input type="hidden" name="id" value="<?php echo $id ?>" readonly/><br/>
                                    <br>
                                    <div class="form-control2 w3layouts">
                                        <label style="color: #FFFFFF">NAME:</label>
                                        <input type="text" name="name" value="<?php echo $name ?>"/>
                                        <span style="color: red;" class="error"> <?php echo $nameErr; ?></span>
                                    </div>

                                    <div class="form-control2 w3layouts">
                                        <label style="color: #FFFFFF">PHONE:</label>
                                        <input type="text" name="phone" value="<?php echo $phone ?>"/>

                                        <span style="color: red;" class="error"><?php echo $phoneErr; ?></span>
                                    </div>

                                    <div class="form-control2 w3layouts agileinfo">
                                        <label style="color: #FFFFFF">EMAIL:</label>
                                        <input type="text" name="email" value="<?php echo $email ?>"/>
                                        <span style="color: red;" class="error"> <?php echo $emailErr; ?></span>
                                    </div>

                                    <input type="submit" class="register" name="submit" value="Submit">
                                    <a style="border-radius: 20px;border: 1px solid #286fc2; padding: 6px 133px; font-size: 22px; color: white; background: #3970b0;"
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