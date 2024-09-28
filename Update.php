<?php
    include 'Connect.php';
    //Set data in input field
    $id = $_GET['id'];
    $str = "select * from student where sid = $id";
    $res = mysqli_query($con,$str);
    $row = mysqli_fetch_assoc($res);

    $name = $row['sname'];
    $email = $row['semail'];
    $phnumber = $row['snum'];
    $date = $row['sdate'];
    $address = $row['saddress'];
    

    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['phnumber'];
        $date = $_POST['date']; 
        $address = $_POST['address']; 
        //updating data here
        $sql = "update student set sname = '$name',semail = '$email' , snum = '$number' , sdate = '$date',
        saddress = '$address' where sid = $id";
        $res = mysqli_query($con,$sql);
        if($res){
            // echo "<h1>Update Success</h1>";
            header('location:Display.php');
        }
        else{
            die (mysqli_error($con));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <form method="post" >
      <div class="container">
        <h1>Update user</h1>
        <div class="mb-3">
          <label class="form-label">Enter Name</label>
          <input
            type="text"
            class="form-control"
            aria-describedby="emailHelp"
            name="name"
            value="<?php echo $name; ?>"
          />
        </div>
        <div class="mb-3">
          <label  class="form-label"
            >Enter Email</label
          >
          <input
            type="email"
            class="form-control"
            name="email"
            value="<?php echo $email; ?>"
          />
        </div>
        <div class="mb-3">
          <label  class="form-label"
            >Enter Number</label
          >
          <input
            type="number"
            class="form-control"
            name="phnumber"
            value="<?php echo $phnumber; ?>"
          />
        </div>
        <div class="mb-3">
          <label  class="form-label"
            >Enter Date</label
          >
          <input
            type="date"
            class="form-control"
            name = "date"
            value="<?php echo $date; ?>"
          />
        </div>
        <div class="mb-3">
          <label class="form-label">Enter Address</label>
          <textarea class="form-control" name="address" rows="3" ><?php echo $address; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
      </div>
    </form>
  </body>
</html>