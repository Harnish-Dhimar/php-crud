<?php
    include 'Connect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from student where sid =  $id";
        $res = mysqli_query($con,$sql);
        if($res){
            // echo "<h1>Insert Success</h1>";
            header('location:Display.php');
        }
        else{
            die (mysqli_error($con));
        }
    }
    
?>