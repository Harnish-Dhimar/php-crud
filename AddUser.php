<?php
    include 'Connect.php';
    if(isset($_POST['submit']) && $_FILES['img']){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phnumber = $_POST['phnumber'];
        $date = $_POST['date']; 
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $hobbies = implode(', ', $_POST['hobbies']);

        $fname = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $path = './img/' . $fname;  // Concatenate the folder and the file name

        if (move_uploaded_file($tmp_name, $path)) {
        $sql = "insert into student (sname,semail,snum,sdate,simg,saddress,sgender,shobbies) values('$name','$email',$phnumber,'$date','$fname','$address','$gender','$hobbies')";
        $res = mysqli_query($con,$sql);
        if($res){
            // echo "<h1>Insert Success</h1>";
            header('location:Display.php');
        }
        else{
            die (mysqli_error($con));
        }
      }
      else{
        echo 'Failed to upload file';
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
    <form method="post" enctype="multipart/form-data">
      <div class="container">
        <h1>Add user</h1>
        <div class="mb-3">
          <label class="form-label">Enter Name</label>
          <input
            type="text"
            class="form-control"
            aria-describedby="emailHelp"
            name="name"
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
          />
        </div>
        <div class="mb-3">
          <label  class="form-label"
            >Select Image</label
          >
          <input type="file" class="form-control" name="img" id="">
        </div>
        <div class="mb-3">
          <label class="form-label">Enter Address</label>
          <textarea class="form-control" name="address" rows="3"></textarea>
        </div>

        <!-- Gender Radio Buttons -->
        <div class="mb-3">
          <label class="form-label">Select Gender</label><br>
          <input type="radio" name="gender" value="Male" /> Male
          <input type="radio" name="gender" value="Female" /> Female
          <input type="radio" name="gender" value="Other" /> Other
        </div>

        <!-- Hobbies Checkboxes -->
        <div class="mb-3">
          <label class="form-label">Select Hobbies</label><br>
          <input type="checkbox" name="hobbies[]" value="Reading" /> Reading
          <input type="checkbox" name="hobbies[]" value="Travelling" /> Travelling
          <input type="checkbox" name="hobbies[]" value="Gaming" /> Gaming
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </form>
  </body>
</html>
