<?php include 'dbconnect.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rigen Marketing | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

    <link rel="icon" href="icon.png">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style type="text/css">
      .skin-blue .main-header .navbar {
          background-color: #367fa9;
      }  
      #loading {
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         position: fixed;
         display: block;
         opacity: 0.7;
         background-color: #fff;
         z-index: 99;
         text-align: center;
      }

      #loading-image {
        position: absolute;
        top: 35%;
        left: 50%;
        z-index: 100;
      }
      @media only screen and (max-width: 600px) {
        #loading-image {
          position: absolute;
          top: 35%;
          left: 22%;
          z-index: 100;
        }
        .marg-top {
          margin-top: 50px;
        }
        .navbar-static-top{
          display: none;
        }
      }
    </style>


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="loading">
  <img id="loading-image" src="Spinner-1s-200px.gif" alt="Loading..." />
</div>
<div class="wrapper">

  
       <?php  include 'header.php'; ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1> 
         
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>
    
    <div class="col-lg-4 ">
        <!-- small box -->
      <div class="small-box  " style="padding: 30px; background: #3c8dbc; color: white">
        <div class="inner"> 
          <h3 class="remaining"> <?php 
          $query1 = "SELECT  count(code) as code   from gecode where branch = '".$_GET['id']."' and stat != 'used'";
          $query1 = mysqli_query( $conn, $query1 );
          $rows1 = mysqli_fetch_assoc($query1);
          echo $rows1['code'];
          ?>  </h3>

          <p>Total number of remaining Code</p>
        </div>
         
      </div>
    </div> 
    <div class="col-lg-4 ">
        <!-- small box -->
      <div class="small-box  " style="padding: 30px; background: #3c8dbc; color: white">
        <div class="inner"> 
          <h3 class="used"> <?php 
          $query1 = "SELECT  count(code) as code   from gecode where branch = '".$_GET['id']."'  and stat = 'used' ";
          $query1 = mysqli_query( $conn, $query1 );
          $rows1 = mysqli_fetch_assoc($query1);
          echo $rows1['code'];
          ?>  </h3>

          <p>Total number of used Code</p>
        </div>
         
      </div>
    </div> 
    <div class="col-lg-4  "> 
       <!-- small box -->
      <div class="small-box  " style="padding: 30px; background: #3c8dbc; color: white">
        <div class="inner"> 
          <h3 class="all"> <?php 
          $query1 = "SELECT  count(code) as code   from gecode Where branch = '".$_GET['id']."'  ";
          $query1 = mysqli_query( $conn, $query1 );
          $rows1 = mysqli_fetch_assoc($query1);
          echo $rows1['code'];
          ?>  </h3>

          <p>Total number of all Generated Code</p>
        </div>
         
      </div>
    </div> 
    
    <!-- Main content -->
    <section class="content">
        
      <!-- Main row -->
      <div class="row">
        
        <div class="col-md-12">
          <div class=" pull-left  " style="margin-bottom: 10px;">
            <select class="form-control select-branch" onchange="location = this.value;">
              <option>Select Branch</option>
              <?php 
              $query3 = "SELECT  *  from branches ";
              $query3 = mysqli_query( $conn, $query3 );
              while ( $rows3 = mysqli_fetch_assoc($query3) ) {   ?>
              <option value="used-code.php?id=<?php echo $rows3['id']; ?>"><?php echo $rows3['name']; ?></option>
            <?php } ?> 
            </select>
          </div>
        </div>
        <div class="col-md-12"> 
          <div class="box box-info marg-top" style="">

            <div class="box-header with-border">
              <!-- <h3 class="box-title">Latest Orders</h3> -->
              <div class="text-center"><h2 class="  text-center">List of Used Codes</h2></div>
              
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <input type="hidden" id="hidden-branch" name="branch-hidden" value="1">
                <div class="table-responsive">

                  <table class="table no-margin" id="example2" style="font-size: 18px;">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Phone</th> 
                      <th class="text-center">Code</th> 
                    </tr>
                    </thead>
                    <tbody > 
                        <?php 
                        $id = $_GET['id'];   
                        $query = "SELECT * from gecode where branch = '$id' and stat = 'used' "; 
                        $query = mysqli_query( $conn, $query ); 
                        $ctr = 0;
                        $code = array();
                        while ( $rows = mysqli_fetch_assoc($query) ) { 
                            $code[] = $rows['code'];
                        } 
                        $code = implode("', '", $code);
                        
                        $query1 = "SELECT * from member_rigen where code IN ('$code') ";  
                        $query1 = mysqli_query( $conn, $query1 ); 
                        while ( $rows1 = mysqli_fetch_assoc($query1) ) {
                          
                          $ctr++;
                          $output .= "<tr>". 
                            "<td class='text-center'>".$ctr."</td>".
                            "<td class='text-center'>".$rows1['name']."</td>".
                            "<td class='text-center'>".$rows1['phone']."</td>".
                            "<td class='text-center'>".$rows1['code']."</td>".
                          "</tr>";
                          
                        }
                        echo $output;
                            
                        ?>
                    </tbody>
                  </table>
                </div> 
            </div> 
          </div>
        </div>
         
      </div>
      </section>
        <!-- /.Left col -->
       
      </div>
      <!-- /.row (main row) -->

    <!-- </section> -->
    <!-- /.content -->
  </div>
 
  <!-- /.content-wrapper -->
 <?php include 'footer.php'; ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(document).ready(function(){
    $('.add-branch').click(function(){
        window.location.href = "add-branch.php";
    });
    $('.used_code').click(function(){
        window.location.href = "used-code.php";
    });  
    $('.register').click(function(){
        window.location.href = "register.php";
    });
    $('.listmember').click(function(){
        window.location.href = "dashboard.php";
    });
    $('.gencode').click(function(){
        window.location.href = "generatecode.php";
    });
    $('.req_payout').click(function(){
        window.location.href = "req-payout.php";
    });
    $('.payout').click(function(){
        window.location.href = "payout.php";
    });
$('.logout-btn').click(function(){
        window.location.href = "logout.php";
    });
  });
  $(document).ready(function(){
     
    $('#loading').css("display","none");
    
    // $('.select-branch').on("change",function(){
    //   $('#loading').css("display","block");
    //   var id = $(this).val();  
    //   $.ajax({
    //       type : 'POST',
    //       url: 'function.php',
    //       datatype:'JSON',
    //       data:{
    //         action: "check_used_code",
    //         id : id, 
    //       }, 
    //       success: function(data){   
    //         $('#loading').css("display","none"); 
    //         $('#append-tbody').html( data ); 
    //       }
    //     });
    // }); 
  });
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
