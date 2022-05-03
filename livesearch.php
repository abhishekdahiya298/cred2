<?php
include 'conn.php';
$limit = 4;


if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $querry = "SELECT * FROM users4 WHERE firstname LIKE '{$input}%'  LIMIT {$offset},{$limit}";


    $result = mysqli_query($conn, $querry);
    if (mysqli_num_rows($result) > 0) { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FIRSTNAME</th>
                    <th scope="col">LASTNAME</th>
                    <th scope="col">AGE</th>
                    <th scope="col">PASSWORD</th>
                    <th scope="col">DELETE</th>
                    <th scope="col">UPDATE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $age = $row['age'];
                    $password = $row['password'];

                ?>
                    <tr>
                        <th><?php echo $id; ?></th>
                        <td><?php echo $firstname; ?></td>
                        <td><?php echo $lastname; ?></td>
                        <td><?php echo $age; ?></td>
                        <td><?php echo $password; ?></td>
                        <td>

                            <form action="delete.php" method="post" name="">
                                <button type="submit" name="submitdelete" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <input type="hidden" name="deleteid" value="<?php echo $row['id'] ?>">
                            </form>
                        </td>
                        <td>
                            <form action="update.php" method="post">
                                <button type="submit" name="submitupdate" class="btn btn-success">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <input type="hidden"="updateid" value="<?php echo $row['id'] ?>">

                            </form>
                        </td>

                    </tr>

                <?php     } ?>
            </tbody>




        </table>
        <?php

        $sql = "SELECT * FROM users4 WHERE firstname LIKE '{$input}%'  ";
        $output = mysqli_query($conn, $sql) or die("query failed");

        if (mysqli_num_rows($output) > 0) {

            $total = mysqli_num_rows($output);
            $total_record = mysqli_num_rows($output);

            $total_page = ceil($total_record / $limit);
            echo ' <ul class="pagination">';
            if ($page > 1) {
                echo '
            <li class="page-item">
              <a class="page-link" href="display.php?page=' . ($page - 1) . '">Prev</a>
            </li>';
            }
            for ($i = 1; $i < $total_page; $i++) {
                if ($i == $page) {
                    $class = "active";
                } else {
                    $class = "";
                }

                echo  '<li class="page-item  ' . $class . '"><a class="page-link" href="display.php?page=' . $i . '">' . $i . '</a></li>';
            }



            if ($total_page > $page) {
                echo '
          <li class="page-item">
            <a class="page-link" href="display.php?page=' . ($page + 1) . '">Next</a>
          </li>';
            }


            echo '</ul>';
        }




        ?>













<?php
    } else {
        echo "<h6 class='text-danger text-center mt-3'>NO DATA Found</h6> ";
    }
}

?>