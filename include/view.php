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
    <link rel="stylesheet" href="../css/style.css">


    <title>Details</title>  </head>
    <style>
      tr:nth-child(even) {background-color: #f2f2f2;}

    </style>
  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>



     <?php
      include 'nav.php';


      if($flag==0){
      echo '
      <div class="text-center" style="font-size: 40px;font-family: sans-serif;margin-bottom: 1%;">View Details</div>
            <div style="margin: 20px 0px;">
    <form action="view.php" method="post">
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
      ';
    }
    else if($flag==1){

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
                                              $adate1 = $row['adate'];
                                              $adate = explode('/', $row['adate']);
                                              //echo $adate[0];
                                                  echo '
                                              <div class="container">
                                                  <table class="view-font" width="50%">
                                                    <tr >
                                                      <td>Name</td>
                                                      <td>'.$row["name"].'</td>
                                                    </tr>

                                                    <tr>
                                                      <td>Roll no.</td>
                                                      <td>'.$row["roll"].'</td>
                                                    </tr>

                                                    <tr>
                                                      <td>Mobile no.</td>
                                                      <td>'.$row["mobile"].'</td>
                                                    </tr>

                                                    <tr>
                                                      <td>Admission Date</td>
                                                      <td>'.$row["adate"].'</td>
                                                    </tr>

                                                    <tr>
                                                      <td>Shift</td>
                                                      <td>'.$row["shift"].'</td>
                                                    </tr>
                                                  </table>
                                              ';
                                              $sql = "select * from r".$rn." ORDER BY date LIMIT 1";
                                              $result = mysqli_query($conn, $sql);
                                              if (mysqli_num_rows($result) > 0) {
                                      // output data of each row
                                                      while($row = mysqli_fetch_assoc($result)) { 
                                                              $endDate1 =  $row["date"];
                                                              $endDate = explode('/', $row["date"]);
                                                              //echo $endDate[0];
                                                              //echo '<div class="container">'; 
                                                              if ($adate[0] == $endDate[0]) {
                                                                $sql = "SELECT * FROM month_name WHERE num = '$adate[0]'";
                                                              }else{
                                                                $sql = "SELECT * FROM month_name WHERE num >= '$adate[0]' OR num <= '$endDate[0]'";  
                                                              }
                                                              $result = mysqli_query($conn, $sql);
                                                              if (mysqli_num_rows($result) > 0) {
                                                      // output data of each row
                                                                      while($row = mysqli_fetch_assoc($result)) { 
                                                                        $month = $row["num"];
                                                                        $month1 = $row["month"];
                                                                        $sql1 = "SELECT COUNT(*) FROM r".$rn." WHERE date LIKE '".$month."%'";
                                                                        $result1 = mysqli_query($conn, $sql1);
                                                                        if (mysqli_num_rows($result1) > 0) {
                                                                      // output data of each row
                                                                              while($row = mysqli_fetch_assoc($result1)) { 
                                                                                  $count = $row["COUNT(*)"];
                                                                                  $sql2 = "SELECT total FROM month WHERE month = '$month'";
                                                                                  $result2 = mysqli_query($conn, $sql2);
                                                                                  if (mysqli_num_rows($result2) > 0) {
                                                                                // output data of each row
                                                                                        while($row = mysqli_fetch_assoc($result2)) {
                                                                                              $total = $row["total"];
                                                                                              $absent = $total - $count;
                                                                                        }
                                                                                  } 
                                                                                 echo '<div class="row" style="margin: 1% 0;">

                                                                                    <div class="col-lg-10 col-8 month" id="'.$month1.'1"><span style="margin-left: 20px;position: relative;top: 5px;font-size: 20px;font-family: sans-serif;color:white;">'.$month1.'</span></div>
                                                                                    <div class="col-lg-1 col-2"><input type="button" class="btn btn-success" value="'.$count.'"></div>
                                                                                    <div class="col-lg-1 col-2"><input type="button" class="btn btn-danger" value="'.$absent.'"></div>
                                                                                    
                                                                                    
                                                                                    </div>
                                                                                    <script>
                                                                                      $("#'.$month1.'1").click(function(){
                                                                                        $(".month_table").fadeOut(1000);
                                                                                        $("#'.$month1.'").delay(1000).fadeIn();
                                                                                        });
                                                                                    </script>
                                                                                    <div class="container month_table" id="'.$month1.'" style="margin:3% 0;">
                                                                                      <table width=70% style="position:relative;left:10%;" border="3px">
                                                                                        <tr style="background-color:grey;">
                                                                                          <th>Date</th>
                                                                                          <th>Shift</th>
                                                                                          <th>Topic</th>
                                                                                        </tr>
                                                                                  ';
                                                                                  $sql2 = "SELECT * FROM r".$rn." WHERE date LIKE '".$month."%'";
                                                                                  $result2 = mysqli_query($conn, $sql2);
                                                                                  if (mysqli_num_rows($result2) > 0) {
                                                                              // output data of each row
                                                                                        while($row = mysqli_fetch_assoc($result2)) {
                                                                                                        if($row["shift"]=="1"){
                                                                                                          $shift = "8 am to 10 am";
                                                                                                        }elseif ($row["shift"]=="2") {
                                                                                                          $shift = "10 am to 12 pm";
                                                                                                        }elseif ($row["shift"]=="3") {
                                                                                                          $shift = "2 pm to 4 pm";
                                                                                                        }
                                                                                                        elseif ($row["shift"]=="4") {
                                                                                                          $shift = "4 am to 6 pm";
                                                                                                        }elseif ($row["shift"]=="5") {
                                                                                                          $shift = "6 am to 8 pm";
                                                                                                        }

                                                                                                      echo '
                                                                                                          <tr>
                                                                                                              <td style="padding:2%;">'.$row["date"].'</td>
                                                                                                              <td>'.$shift.'</td>
                                                                                                              <td>'.$row["topic"].'</td>
                                                                                                          </tr>
                                                                                                      ';
                                                                                                   }
                                                                                  }
                                                                                  echo ' </table>
                                                                                    </div>
                                                                                    
                                                                                  ';

                                              }
                                                    }
                                                         
                                                         
                                                      }
                                              }
                                            echo '</div>';





                                      }
                                    }


                                      }
                      }

            }
}elseif(mysqli_num_rows($result) == 0){
   echo '
    <script>
              alert("Student Does not exist...");
              url = "view.php";
              window.location = url;
            </script>
  ';
}else{
  echo '
    <script>
              alert("Multiple Students present try Roll number...");
              url = "view.php";
              window.location = url;
            </script>
  ';
}
      
  }
    ?>







  </body>
</html>