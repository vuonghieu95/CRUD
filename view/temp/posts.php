<div class="div_phai__table">
    <div class="title" style="text-align: center;padding: 15px"><h3>User Management</h3></div>

    <a href="create.php">
        <button type="button" class="btn btn-primary btn-create" style="float: left" data-toggle="modal"
                data-target="#createModal">
            create
        </button>
    </a>
    <div class="header_search " style="float: left">
        <form class="form-search" action="?action=search" method="get">
            <input type="text" name="name_search" placeholder="Search...">
            <button name="button" class="search"><i class="fa fa-search" aria-hidden="true"></i></button>
            </a>
        </form>
    </div>
    <table id="t01">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php

        $postController = new PostController();
        $data = $postController->search();
        //        $sqlCount = "SELECT * FROM `tbl-sv` WHERE name LIKE '%$search%' ";
        //        $count = $con->query($sqlCount)->rowCount();
        //        $count =(String)$postController->countSearch();
        //             echo "List user: " . $count . "-user ";
        ?>
        <?php foreach ($data as $row): ?>

            <tr>
                <td class="id"><?php echo $row['id'] ?></td>
                <td class="name"><?php echo $row['name'] ?></td>
                <td class="phone"><?php echo $row['phone'] ?></td>
                <td class="email"><?php echo $row['email'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>">
                        <button type="button" class="btn-edit btn btn-primary" data-toggle="modal"
                                data-target="#createModal" style="padding: 3px"
                                data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
                    </a>
                </td>

                <td>
                    <a href="delete.php?id=<?php echo $row['id'] ?>">
                        <button type="button" class="btn-del btn btn-primary" data-toggle="modal"
                                data-target="#createModal" style="padding: 3px"
                                data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash-o"></i></button>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style> <?php include('css/phantrang.css') ?></style>
    </head>
    <body>
    <div class="phantrang" align="center">

        <ul>
            <?php
            include ('model/config.php');
            if (isset($total_pages)) {
                if ($total_pages > 1) // nếu tổng số trang > 1 in dòng Page..of..
                {
                    echo '<li class="single" style="list-style-type: none; display: inline-block">Page ' . $curr_page . ' of ' . $total_pages . '</li>' . "</br>";
                    // nếu trang hiện tại lớn hơn số link muốn hiển thị
                    if ($curr_page > 5) {
                        // thì hiển thị nút 'First'
                        echo '<li style="list-style-type: none; display: inline-block"><a href="?page=1">First</a></li>';
                    }
                    // nếu trang hiện tại > 1
                    if ($curr_page > 1) {
                        // hiển thị nút 'Previous'
                        echo '<li style="list-style-type: none; display: inline-block"><a href="?page=' . ($curr_page - 1) . '"><    </a> </li>';
                    }
                    // hiển thị các link bao gồm trang hiện tại và link trang hiển thị (trái và phải) bắt đầu từ $start, kết thúc là $end
                    // $start và $end được tính trong pagination.php
                    for ($pages = $start; $pages <= $end; $pages++) {
                        if ($pages == $curr_page) {
                            echo '<li class="active" style="list-style-type: none; display: inline-block"><a href="?page=' . $pages . '">' . $pages . '</a></li>';
                        } else {
                            echo '<li style="list-style-type: none; display: inline-block"><a href="?page=' . $pages . '">' . $pages . '</a></li>';
                        }
                    }
                    // nếu trang hiện tại < tổng số trang
                    if ($curr_page < $total_pages) {
                        // thì hiển thị nút 'Next'
                        echo '<li style="list-style-type: none; display: inline-block"><a href="?page=' . ($curr_page + 1) . '">></a></li>';
                    }
                    // nếu trang hiện tại + số link muốn hiển thị (ở đây là + với số link bên phải) > tổng số trang
                    if (($curr_page + 5) < $total_pages) {
                        // thì hiển thị nút 'Last'
                        echo '<li style="list-style-type: none; display: inline-block" ><a href="?page=' . $total_pages . '">Last</a> </li>';
                    }
                }
            }
            ?>
        </ul>
    </div>
    </body>
    </html>

</div>
