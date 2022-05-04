<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="extra.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="toastr.min.css"><!-- JavaScript Bundle with Popper -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <header class="p-3 bg-dark text-white ">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-center  justify-content-between ">

                <h1 class="display-1">USERS TABLE</h1>



            </div>
    </header>

    <div class="container mt-2 pt-2">
        <div class="row ">
            <div class="col-sm-8 col-xs-12 card bg-light mb-3">
                <form action="" method="post" name="" class="pt-2 addform">
                    <div class="input-group mb-3">
                        <span class="input-group-text"> First Name</span>
                        <input type="text" class="form-control" placeholder="Enter first name" name="firstname" value="">
                    </div>



                    <div class="input-group mb-3">
                        <span class="input-group-text">Password</span>
                        <input type="text" class="form-control" placeholder="Enter your password" name="password" value="">
                    </div>




                    <!-- <button type="submit" class="btn btn-primary m-2" name="submit">Submit</button> -->
                    <input type="submit" class="btn btn-primary m-2 aler" name="submit" value="submit">
                </form>




            </div>

        </div>
        <?php
        include 'conn.php';
       
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $username = $_POST['firstname'];
        $password = $_POST['password'];

        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "select *from users4 where firstname = '$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
       
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            session_start();
            $_SESSION['logedin']=true;
            $_SESSION['firstname'] = $username;
            header('location:display.php');
        } else {
            echo "<h1> Login failed. Invalid username or password.</h1>";
        }
    }

        ?>





</body>

</html>