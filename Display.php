<?php
    include 'Connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
</head>
<body>
    <div class="container">
        <button class="btn btn-primary m-3"><a class="text-light" href="AddUser.php">Add</a></button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">NUMBER</th>
      <th scope="col">Date of Join</th>
      <th scope="col">Addres</th>
      <th scope="col">Gender</th>
      <th scope="col">Hobbies</th>
      <th scope="col" >Action</th>
    </tr>
  </thead>
  <tbody>
    <?php

        $sql = "select * from student";
        $res = mysqli_query($con,$sql);
        if($res){
            while ($row = mysqli_fetch_assoc($res)) {
                # code...
                $id =  $row['sid'];
                $name =  $row['sname'];
                $email =  $row['semail'];
                $num =  $row['snum'];
                $date =  $row['sdate'];
                $img = $row['simg'];
                $address = $row['saddress'];
                $gender = $row['sgender'];
                $hobbies = $row['shobbies'];
                echo ' <tr>
                <td>'.$id.'</td>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$num.'</td>
      <td>'.$date.'</td>
      <td>'.$address.'</td>
      <td>'.$gender.'</td>
      <td>'.$hobbies.'</td>
      <td><img src="img/'.$img.'" height="150px" width="100px"/></td>
      <td>
    <button><a href="Update.php?id='.$id.'">EdIT</a></button>
    <button><a href="Delete.php?id='.$id.'">Delete</a></button>
   </td>
    </tr>';
            }
        }
        
    ?>
   
  </tbody>
</table>
</div>
</body>
</html>