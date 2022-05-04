<!DOCTYPE html>

<head>
    <title>
        Users table
    </title>
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
    <?php
    include 'conn.php';
    //   if(count($_POST)!=0){
    //       extract($_POST);
    if (isset($_POST["submit"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $age = $_POST["age"];
        $password = $_POST['password'];
        $new = "INSERT INTO users4 ( firstname, lastname, age, password, created_at)
      VALUES ('$firstname', '$lastname ','$age','$password',now())";

        $result = mysqli_query($conn, $new);
        // if($result==true){
        //     echo "created data";
        // }
    }
    // else{
    //     echo "failed";
    // }
    //   }

    ?>



    <header class="p-3 bg-dark text-white ">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-center  justify-content-between ">

                <h1 class="display-1">USERS TABLE</h1>


                <div class="text-end mr-5 ">
                    <!-- Button trigger modal -->
                   <a href="login.php" > <button type="button" class="btn btn-primary">
                        login
                    </button></a>

                    
                </div>
            </div>
    </header>


    <main>
      



        <div class="container mt-2 pt-2">
            <div class="row ">
                <div class="col-sm-8 col-xs-12 card bg-light mb-3">
                    <form action="addform.php" method="post" name="" class="pt-2 addform">
                        <div class="input-group mb-3">
                            <span class="input-group-text"> First Name</span>
                            <input type="text" class="form-control" placeholder="Enter first name" name="firstname" value="">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Last Name</span>
                            <input type="text" class="form-control" placeholder="Enter last name" name="lastname" value="">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Age</span>
                            <input type="text" class="form-control" placeholder="Enter your age " name="age" value="">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Password</span>
                            <input type="text" class="form-control" placeholder="Enter your password" name="password" value="">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"> Confirm Password</span>
                            <input type="text" class="form-control" placeholder="Enter your password" name=" confirmpassword" value="">
                        </div>



                        <!-- <button type="submit" class="btn btn-primary m-2" name="submit">Submit</button> -->
                        <input type="submit" class="btn btn-primary m-2 aler" name="submit" value="submit">
                    </form>

                    <a href="display.php"><button type="submit" class="btn btn-success m-2" name="submits" value="VIEW USERS"> view users</button></a>


                </div>

            </div>


        </div>


    </main>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"

            }
            var form = $('.addform'),
                form_data;

            function done_func(response) {
                $('.addform')[0].reset();


                toastr["success"](response)
            }

            // fail function
            function fail_func(data) {

                toastr["error"](data.responseText)
            }

            form.submit(function(e) {
                e.preventDefault();
                form_data = $(this).serialize();
                $.ajax({
                        type: 'POST',
                        url: form.attr('action'),
                        data: form_data + "&submit=submit"
                    })
                    .done(done_func)
                    .fail(fail_func);
            });

            console.log("ready!");
        });
    </script>

</body>


</html>