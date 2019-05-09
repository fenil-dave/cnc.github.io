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
     <style>
      tr:nth-child(even) {background-color: #f2f2f2;}

    </style>
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
    ?>
    <div class="container">
          <table width="80%" border="3px">
            <tr>
              <th>Roll no.</th>
              <th>Name</th>
              <th>Mobile</th>
              <th>Shift</th>
              <th>Date</th>
            </tr>
            <?php
              include '../database/connection.php';
              $sql = "SELECT roll, name, mobile, shift, adate FROM student";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_assoc($result)) {
                                $shift = "";
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

                                echo '<tr>
                                  <td>'.$row["roll"].'</td>
                                  <td>'.$row["name"].'</td>
                                  <td>'.$row["mobile"].'</td>
                                  <td>'.$shift.'</td>
                                  <td>'.$row["adate"].'</td>
                                </tr>';
                        }
                      }

            ?>
          </table>
    </div>
    
  </body>
</html>