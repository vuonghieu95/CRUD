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
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = $_POST["phone"];
    }

    if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["phone"])) {

    } else {

        require_once ('controller/PostController.php');
        $postController = new PostController();
        $postController ->addController();

        header('Location: index.php');
    }
}

?>
<?php require_once('view/temp/header.php');

?>

<div class="main baongoai">
    <div class="container">
        <h1 class="w3ls">CREATE</h1>
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
                        <form class="create" method="post"
                              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-control2 w3layouts">
                                <input type="text" name="name" placeholder="Name:" value="<?php echo $name; ?>">
                                <span style="color: red;" class="error"> <?php echo $nameErr; ?></span>
                            </div>

                            <div class="form-control2 w3layouts">
                                <input type="text" placeholder="Phone:" name="phone" value="<?php echo $phone; ?>">

                                <span style="color: red;" class="error"><?php echo $phoneErr; ?></span>
                            </div>

                            <div class="form-control2 w3layouts agileinfo">
                                <input style="border-radius: 20px;padding: 4px 41px;" type="email"
                                       placeholder=" E-mail:" name="email" value="<?php echo $email; ?>">
                                <span style="color: red;" class="error"> <?php echo $emailErr; ?></span>
                            </div>
                            <input type="submit" class="register" name="submit" value="Submit">
                            <a style="    border-radius: 20px;border: 1px solid #286fc2; padding: 6px 133px; margin-left: 17px; font-size: 22px; color: white; background: #3970b0;" href="index.php">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</body>
</html>