<?php  


include'conn.php';
if (isset($_POST["deleteid"])){
    $deleteid=$_POST['deleteid'];
    $querry="DELETE FROM users4 WHERE id='$deleteid' ";
    mysqli_query($conn,$querry);
   
    header('location:display.php');
}
?>