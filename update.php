<!DOCTYPE html>

<head>
    <title>
        Users table
    </title>
    <link rel="stylesheet" href="extra.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php
    include 'conn.php';
    // extract($_GET);

    // $sql="SELECT * FROM users4 WHERE id='$id' ";
    // $result=mysqli_query($conn,$sql);
    // if(mysqli_num_rows($result)>0){
    //   while($res=mysqli_fetch_array($result)){
    //       $username=$res['username'];
    //       $password=$res['password']; 
    //   }


    // }
    // else{
    //     echo "no record found";
    //     die();
    // }


    if (isset($_POST["updateid"])) {
        $id = $_POST['updateid'];

        $sql = "SELECT * FROM users4 WHERE id='$id' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($res = mysqli_fetch_array($result)) {
                $firstname = $res['firstname'];
                $lastname = $res['lastname'];
                $age = $res['age'];
                $password = $res['password'];
            }
        }
    }







    if (isset($_POST["update"])) {
        // if(count($_POST)!=0)
        // {
        //     extract($_POST);
        //   //   extract($_GET);


        $id = $_POST['id'];

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];

        $password = $_POST['password'];
        $new = "UPDATE users4 SET firstname='$firstname',lastname='$lastname',age='$age',password='$password' WHERE id='$id' ";
        $result = mysqli_query($conn, $new);
        if ($result == true) {
            echo "DATA updated";
        }
    }




    ?>
    <header class="bg-dark text-light  justify-content-center d-flex ">
        <div class="p-4 ">
            <h1 class="display-1">UPDATE USER TABLE</h1>
        </div>
    </header>


    <main>
        <div class="container mt-2">
            <div class="row">
                <div class="col-sm-8 col-xs-12 card bg-light mb-3 pt-2">
                    <form action="" method="post" name="">
                      
                        <div class="input-group mb-3">
                            <span class="input-group-text"> First Name</span>
                            <input type="text" class="form-control" placeholder="Enter first name" name="firstname" value="<?php echo $firstname ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Last Name</span>
                            <input type="text" class="form-control" placeholder="Enter last name" name="lastname" value="<?php echo $lastname ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Age</span>
                            <input type="text" class="form-control" placeholder="Enter your age " name="age" value="<?php echo $age ?>">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Password</span>
                            <input type="text" class="form-control" placeholder="Enter your password" name="password" value="<?php echo $password ?>">
                        </div>



                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-primary m-2" name="update">UPDATE</button>
                    </form>

                    <a href="display.php"><button type="submit" class="btn btn-success m-2" name="submit" value="VIEW USERS"> veiw users</button></a>


                </div>

            </div>


        </div>

    </main>

</body>

</html>