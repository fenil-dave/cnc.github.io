<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="https://www.justdial.com/Rajkot/Hiren-Dharaiya-Cnc-Classes-Behind-Fire-Brigade-Mavdi-Plot/0281PX281-X281-140412101547-G8R3_BZDET" target="_blank">CNC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="new.php">New</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="edit.php">Edit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view.php">View</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="list.php">List</a>
      </li>
      </ul>
      <div class="nav-item ml-auto mr-1">
        <?php
          if (isset($_GET["id"]) && $_GET["id"] == 3) {
            $bulk = "bulk1.php";
            $create = "create1.php";
            echo '<div id="bulk_check"><input type="checkbox" name="check" checked></div>';
          }
          else {
           $bulk = "bulk.php";
           $create = "create.php";
            echo '<div id="bulk_check"><input type="checkbox" name="check"></div>'; 
          }
        ?>
      </div>
      <div class="nav-item mr-1">
        <input type="button" class="btn btn-success" value="Bulk upload" id="bulk">
        <form action="<?php echo $bulk; ?>" method="post" enctype="multipart/form-data" hidden>
        <input type="file" name="excel" class="btn btn-success" id="upload" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="fileName" onchange="check()">
        <input type="submit" id="submit" name="import">
        </form>
        <script>
          $("#bulk").click(function(){
            $("#upload").trigger('click');
          });
          function check(){
            $("#submit").trigger('click');
          }
           $(document).ready(function(){
        $('#bulk_check input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                url = "index.php?id=3";
                window.location = url;
            }
            else if($(this).prop("checked") == false){
                url = "index.php";
                window.location = url;
            }
        });
    });
        </script>
      </div>
      <div class="nav-item mr-1">
         <a class="btn btn-success" href="<?php echo $create; ?>" id="down_ex">Download Excel</a>
      </div>
    
  </div>
</nav>