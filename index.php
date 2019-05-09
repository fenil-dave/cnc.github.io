<?php
  $flag=0;
  session_start();
  if(isset($_POST['adate']) && !empty($_POST['adate'])){
     if($_POST["shift"] == "select"){
    header("Location: ../include/index.php?id=5");
}else{
  $flag=1;
  $_SESSION['date'] = $_POST['adate'];
  $_SESSION['shift'] = $_POST['shift'];
  $_SESSION['count'] = 0;
  }
}
else if(isset($_SESSION['date']) && !empty($_SESSION['date'])){
  $flag=1;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="../css/style.css">

    <title>CNC / VMC</title>
  </head>
  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>


    <?php
      include 'nav.php';
      if (isset($_GET["id"]) && $_GET["id"] == 2) {
           echo '
              <a id="download_ex" href="student.xlsx"></a>
              <script>
                $(document).ready(function() {
                   $("#download_ex")[0].click();
                });
              </script>
            ';
          
      }else if (isset($_GET["id"]) && $_GET["id"] == 4) {
           echo '
              <a id="download_ex" href="new_student.xlsx"></a>
              <script>
                $(document).ready(function() {
                   $("#download_ex")[0].click();
                });
              </script>
            ';
          
      }else if (isset($_GET["id"]) && $_GET["id"] == 5) {
           echo '
              <script>
                alert("Enter Valid Shift...");
              </script>
            ';
          
      }
    ?>
    <div class="text-center" style="font-size: 40px;font-family: sans-serif;margin-bottom: 1%;">Student Attendence</div>
    
    <?php
      if($flag==0){
        date_default_timezone_set("Asia/calcutta");
        $today = date("m/d/Y");
      echo '
          <form action="index.php" method="post">
      <div class="container">
       <div class="row">
  <div class="form-group col-lg-4">
      <input id="datepicker" value="'.$today.'" name="adate" width="276" />
    <script>



$(document).ready(function() {

  var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  $("#datepicker").datepicker({
    uiLibrary: "bootstrap4",
format: "mm/dd/yyyy",
todayHighlight: true,
startDate: today,
autoclose: true
  });
 $("#datepicker").datepicker("setDate", today);

});

    </script>
    </div>
    <div class="form-group col-lg-4">
      <select class="form-control" name="shift">
        <option value="select">Select Shift...</option>
        <option value="1">8:30 AM - 10:00 AM</option>
        <option value="2">10:00 AM - 12:00 PM</option>
        <option value="3">2:00 PM - 4:00 PM</option>
        <option value="4">4:00 PM - 6:00 PM</option>
        <option value="5">6:00 PM - 8:00 PM</option>
</select>
    
  
    </div>
  
  <button type="submit" class="btn btn-primary col-lg-4 form-control">Submit</button>
 </div>
 </div>
</form>
    
      ';
    }
    else if($flag==1){
    if(isset($_POST['comment']) && !empty($_POST['comment'])){
      echo '
          <script>
            alert("'.$_POST["comment"].'");
          </script>
        ';
  }
    if(isset($_GET['id']) && $_GET['id']==1){
        echo '
          <script>
            alert("Student Does not exist...");
          </script>
        '; 
}

    echo '
        <div>
      <div class="container">
      <form action="../database/attendance.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1" style="font-size: 20px;font-family: sans-serif;">Roll No.</label>
    <input type="text" class="form-control" name="roll" placeholder="Roll No.">
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="font-size: 20px;font-family: sans-serif;">Topic No.</label>
    <input type="text" class="form-control" name="topic" placeholder="Topic No.">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="../database/destroy.php" class="btn btn-success">Done</a>
</form>
</div>
    </div>


    ';
  }
    ?>
    
    
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/6.0.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#reserved-urls -->

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>

    
  </body>
</html>