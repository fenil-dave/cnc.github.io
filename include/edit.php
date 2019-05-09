<?php
$flag=0;
 if(isset($_POST['search']) && !empty($_POST['search'])){
  $option = $_POST['op'];  
  $search = $_POST['search'];
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


    <title>Edit Detail</title>
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
      if(isset($_GET["id"]) && $_GET["id"]==1){
           echo '
            <script>
              alert("Enter Valid Shift..");
            </script>
           ';
      }
 
    ?>
    <div class="text-center" style="font-size: 40px;font-family: sans-serif;margin-bottom: 1%;">Edit Student</div>
    <div style="margin: 20px 0px;">
    <form action="edit.php" method="post">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-12" style="margin: 3% 0;">
          <select class="form-control" name="op">
        <option value="roll">Roll no.</option>
        <option value="mobile">Mobile no.</option>
        <option value="name">Name</option>
        </select>
        </div>
        <div class="col-lg-4 col-12" style="margin: 3% 0;">
          <input type="text" name="search" class="form-control">
        </div>
      <div class="col-lg-4 col-12" style="margin: 3% 0;">
      <input type="submit" name="" class="btn btn-primary form-control" value="Search">
    </div>

</div>
</div>
</form></div>
<?php
  if($flag==1){
    include "../database/connection.php";

    $sql = "SELECT roll FROM student WHERE ".$option." = '".$search."'";
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
            $rn = $row["roll"];  
            $sql = "SELECT * FROM student WHERE roll = '".$rn."'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="text-center" style="font-size: 40px;font-family: sans-serif;margin-bottom: 1%;">Edit Student</div>
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <form>

  <div class="form-group">
    <label for="exampleInputEmail1" style="font-size: 20px;font-family: sans-serif;">Name</label>
    <input type="text" class="form-control" value="'.$row["name"].'" id="name1" placeholder="Name" disabled>
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="font-size: 20px;font-family: sans-serif;">Mobile No.</label>
    <input type="text" class="form-control" value="'.$row["mobile"].'" id="mobile1" placeholder="Mobile no." disabled>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" style="font-size: 20px;font-family: sans-serif;">Roll No.</label>
    <input type="text" class="form-control" value="'.$row["roll"].'" id="roll1" placeholder="Roll No." disabled>
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="font-size: 20px;font-family: sans-serif;">Comment</label>
    <input type="text" class="form-control" value="'.$row["comment"].'" id="comment1" placeholder="" disabled>
  </div>
    <div class="row">
  <div class="form-group col-lg-6">
    <label for="exampleInputPassword1" style="font-size: 20px;font-family: sans-serif;">Date</label>
       <input type="text" class="form-control" value="'.$row["adate"].'" id="date1" placeholder="" disabled>
   
    </div>
    <div class="form-group col-lg-6">
      <label for="exampleInputPassword1" style="font-size: 20px;font-family: sans-serif;">Shift</label>
       <input type="text" class="form-control" value="'.$row["shift"].'" id="shift1" placeholder="" disabled>
      </div>
   </div>
 
</form>
              </div>
              <div class="col-lg-6">
                <form action="../database/update.php" method="post">

  <div class="form-group">
    <label for="exampleInputEmail1" style="font-size: 20px;font-family: sans-serif;">Name</label>
    <input type="text" class="form-control" name="name" id="name2" placeholder="Name" Required>
    <input type="checkbox" id="name">
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="font-size: 20px;font-family: sans-serif;">Mobile No.</label>
    <input type="text" class="form-control" name="mobile" id="mobile2" placeholder="Mobile no." Required>
    <input type="checkbox" id="mobile">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" style="font-size: 20px;font-family: sans-serif;">Roll No.</label>
    <input type="text" class="form-control" id="roll2" name="roll" placeholder="Roll No." Required>
    <input type="checkbox" id="roll">
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="font-size: 20px;font-family: sans-serif;">Comment</label>
    <input type="text" class="form-control" id="comment2" name="comment" placeholder="comment">
    <input type="checkbox" id="comment">
  </div>
    <div class="row">
  <div class="form-group col-lg-6">

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
 $("#datepicker").datepicker({
        "setDate": today,
        "autoclose": true
});

});


        

    </script>


    <label for="exampleInputPassword1" style="font-size: 20px;font-family: sans-serif;">Date</label>
      <input id="datepicker" width="276" name="date" Required/>
      <input type="checkbox" id="date">
   
    </div>
    <div class="form-group col-lg-6">
      <label for="exampleInputPassword1" style="font-size: 20px;font-family: sans-serif;" Required>Shift</label>
      <select class="form-control" id="shift2" name="shift">
        <option value="select">Select Shift...</option>
        <option value="1">8:30 AM - 10:00 AM</option>
        <option value="2">10:00 AM - 12:00 PM</option>
        <option value="3">2:00 PM - 4:00 PM</option>
        <option value="4">4:00 PM - 6:00 PM</option>
        <option value="5">6:00 PM - 8:00 PM</option>
</select>
<input type="checkbox" id="shift">
    
  <input type="text" class="form-control" id="old" name="old" value="'.$rn.'" hidden>
    </div>
   </div>
  <button type="submit" class="btn btn-primary form-control">Submit</button>
</form>
              </div>
            </div>
            
          </div>

  ';

    }
  }

                    
        }
}
elseif (mysqli_num_rows($result) == 0) {
  echo '
    <script>
              alert("Student Does not exist...");
            </script>
  ';
}else{
  echo '
    <script>
              alert("Multiple Students present try Roll number...");
            </script>
  ';
}
  

  
}
?>
<script>
  $("#name").change(function(){
    if(this.checked){
    var g =$("#name1").val();
    $("#name2").val(g);
  }
  else{
    var g= "";
    $("#name2").val(g);
  }
  });
  $("#shift").change(function(){
    if(this.checked){
    var s =$("#shift1").val();
    $("#shift2").val(s);
  }
  else{
    var s= "";
    $("#shift2").val(s);
  }
  });
  $("#mobile").change(function(){
    if(this.checked){
    var a =$("#mobile1").val();
    $("#mobile2").val(a);
  }
  else{
    var a= "";
    $("#mobile2").val(a);
  }
  });
  $("#roll").change(function(){
    if(this.checked){
    var z =$("#roll1").val();
    $("#roll2").val(z);
  }
  else{
    var z= "";
    $("#roll2").val(z);
  }
  });
  $("#comment").change(function(){
    if(this.checked){
    var l =$("#comment1").val();
    $("#comment2").val(l);
  }
  else{
    var l= "";
    $("#comment2").val(l);
  }
  });
  $("#date").change(function(){
    if(this.checked){
    var h =$("#date1").val();
    $("#datepicker").val(h);
  }
  else{
    var h= "";
    $("#datepicker").val(h);
  }
  });
</script>
  </body>
</html>