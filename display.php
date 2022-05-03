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

  <header class="navigation">
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg text-white bg-dark justify-content-between " id="navbar">

        <a class="navbar-brand text-white">
          Display Table
        </a>

<!-- <form method="GET" class="contact__form"> -->
        <!-- <input class="form-control " id="myInput" type="search" name="search" style="margin-right: 35px;" placeholder="Search" aria-label="Search"> -->
        <input id="myInput" type="text" name="search" autocomplete="off"  placeholder="Search..">
        <!-- <input class="btn btn-outline-success my-2 my-sm-0 text-white" type="submit" name="submit"> -->
<!-- </form> -->











        <a href="create.php"> <button type="button" class="btn btn-outline-success my-2 my-sm-0 text-white">Create table</button></a>


      </nav>
    </div>
  </header>




  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12 contact__msg">
        <table class="table table-striped ">
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

          <?php
          include 'conn.php';
          $searchquery = '';
          if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            $searchquery = " WHERE firstname LIKE '%" . $search . "%' OR lastname  LIKE '%" . $search . "%'";
          }





          $limit = 4;

          if (isset($_GET['page'])) {
            $page = $_GET['page'];
          } else {
            $page = 1;
          }
          $offset = ($page - 1) * $limit;


          $querry = "SELECT * FROM users4 $searchquery LIMIT {$offset},{$limit}";

          $result = mysqli_query($conn, $querry);
          while ($res = mysqli_fetch_array($result)) {


          ?>
            <tbody id="myTable">
              <tr>
                <th><?php echo $res['id']; ?></th>
                <td><?php echo $res['firstname']; ?></td>
                <td><?php echo $res['lastname']; ?></td>
                <td><?php echo $res['age']; ?></td>
                <td><?php echo $res['password']; ?></td>

                <td>

                  <form action="delete.php" method="post" name="">
                    <button type="submit" name="submitdelete" class="btn btn-danger">
                      <i class="fa fa-trash"></i>
                    </button>
                    <input type="hidden" name="deleteid" value="<?php echo $res['id']; ?>">
                  </form>
                </td>
                <td>
                  <form action="update.php" method="post">
                    <button type="submit" name="submitupdate" class="btn btn-success">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <input type="hidden" name="updateid" value="<?php echo $res['id']; ?>">

                  </form>
                </td>
                <!-- <td> <a href="update.php?id="><button class="btn btn-success mr-2 "><i class="fa fa-pencil"></i></button></a></td> -->
              </tr>

            </tbody>
          <?php } ?>
        </table>
        <?php

        $sql = "SELECT * FROM users4";
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









      </div>
    </div>
  </div>
  <!-- <div class="alert alert-success "  >

  </div> -->










</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

     

    // // Success function
    // function done_func(response) {
    //   message.html(response)
    
    //   // setTimeout(function() {
    //   //   message.fadeOut();
    //   // }, 2000);
    //   // form.find('input:not([type="submit"]), textarea').val('');
    // }

    // // fail function
    // function fail_func(data) {
    //   // message.fadeIn().removeClass('alert-success').addClass('alert-danger');
    //   // message.text(data.responseText);
    //   // setTimeout(function() {
    //   //   message.fadeOut();
    //   // }, 2000);
    // }

    $(document).ready(function() {
      $("#myInput").keyup(function(){
        var input= $(this).val();
        if (input != ""){
          $.ajax({
            url :"livesearch.php",
            method:"POST",
            data:{input:input},
            success:function(data){
              $(".contact__msg").html(data);
              // $(".contact__msg").css("display","block");
            }


          });
        }
        if (isEmpty($('#myInput'))) {
          // $(".contact__msg").html(data);
     
   
}else{
          $(".contact__msg").css("display","none");

        }
       
      });
      
    });
</script>

</html>