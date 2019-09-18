<?php
    session_start();
    $sname=$_SESSION['schoolId'];
    if(!isset($_SESSION['schoolId']))
    {
        header('location:../../school_log.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

 <?php
        include('head.php');
  ?>


<body id="page-top">
<?php

    if(isset($_SESSION['msg_status'])) {
        if($_SESSION['msg_status']=='success')   {
            echo '<script>alert("Update Success")</script>';
            unset($_SESSION['msg_status']);
          
        }
        else {
            echo '<script>alert("Sorry :(  Update Failed)")</script>';
            unset($_SESSION['msg_status']);
           
        }
    }
?>        
  <?php
        include('nav.php');
  ?>

  <div id="wrapper">

   <?php
        include('side.php');
  ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>PERIODIC TEST 3</a>
          </li>
        </ol>
        
        
        


              <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Classes</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Class</th>
                    <th>Division</th>
                    <!--<th>Standard</th>-->
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Class</th>
                    <th>Division</th>
                    <!--<th>Standard</th>-->
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  
                        <?php  
                            include("../conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM class ORDER BY id ASC";  
                            $result = mysqli_query($sql, $query);  
                            $rows = mysqli_num_rows($result);
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  ?>
                                    <tr>  
                                    <td><?php echo $row["class_name"]; ?></td>  
                                    <td><?php echo $row["div_name"]; ?></td>
                                    <?php
                                        if($row['pt3_s']==1){
                                    ?>
                                    <td>Active</td>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <td>Inactive</td>
                                    <?php
                                        }
                                    ?>
                                    
                                    
                                    <td><a href="editpt3.php?id=<?php echo $row['id'];?>"><i class="fa fa-edit"></i> </a></td>
                                  </tr>  
                                <?php
                                    
                                }  
                            }  
                        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
<style>
    .btn-default.btn-on.active{background-color: #5BB75B;color: white;border:1px solid black;}
.btn-default.btn-off.active{background-color: #DA4F49;color: white;border:1px solid black;}

</style>

      <!-- Sticky Footer -->
      <?php
            include("footer.php");
      ?>
      
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>




  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>

</body>

</html>