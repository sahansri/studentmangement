<?php
include("conn.php");
if(isset($_POST['change'])){
    $user=$_POST['user'];
    $currentpw=$_POST['currentpw'];
    $confirmpw=$_POST['confirmpw'];
    
  

    $qry="UPDATE `teacher` SET `tpassword`='$confirmpw' WHERE `tpassword`='$currentpw' AND `tusername`='$user'";
    $re=mysqli_query($conn,$qry);
    // header("location:");
    echo "
    <script>alert('Added successfully');
    document.location.href ='../pages/teacher/tchangePassword.php';
    </script>
    ";
}
mysqli_close($conn);
?>