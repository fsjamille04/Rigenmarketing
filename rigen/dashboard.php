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
   <meta http-equiv="refresh" content="300">
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
  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <style type="text/css">
    .skin-blue .main-header .navbar {
          background-color: #367fa9;
      } 
    @media only screen and (max-width: 600px) {
         
        .navbar-static-top{
          display: none;
        }
      }
  </style>
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

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="loading">
  <img id="loading-image" src="Spinner-1s-200px.gif" alt="Loading..." />
</div>
<div class="wrapper">

 
      <?php include 'header.php'; ?>
 
 
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>
    <div class="col-lg-4  ">
        <!-- small box -->
      <div class="small-box  " style="padding: 30px; background: #3c8dbc; color: white">
        <div class="inner"> 
          <h3> <?php 
          $query1 = "SELECT  count(counting) as counting   from member_rigen where counting = 8  ";
          $query1 = mysqli_query( $conn, $query1 );
          $rows1 = mysqli_fetch_assoc($query1);
          echo $rows1['counting'];
          ?>  </h3>

          <p>Rigen accounts are ready for approve payout</p>
        </div>
         
      </div>
    </div> 
    <div class="col-lg-4  ">
       
    </div> 
    <div class="col-lg-4  "> 
      <div class="small-box " style="padding: 30px; background: #3c8dbc; color: white">
        <div class="inner"> 
          <h3 class="append-moretogo">  0   </h3>

          <p>More to go</p>
        </div>
         
      </div>
    </div> 
    <!-- Main content -->
    <section class="content">
        
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12" >
            <form class="form-inline form_checkName"> 
              <div class="form-group mx-sm-3 mb-2" style="margin-bot: 10px">
              <button type="submit" style="padding: 10px"  class="btn btn-primary checkName">Search</button>
                <label for="inputName" class="sr-only">Search Name or Phone Number</label>
                <input type="text" style="padding: 20px"  class="form-control" id="inputcheck" placeholder="Code Number">
              </div>
            </form>   
          </div>
        <div class="col-md-8">
          <div class="box box-info">
            <div class="box-header with-border"> 
              
              <div class="col-md-12">
                <div class="box-tools pull-right ">
                  <a type="button" href="#" class="btn btn-lg btn-primary register"> Add Member</a>
                </div>
              </div> 
            </div>
            <div class=" text-center"> 
              <h1  >List of Rigen Member</h1> 
            </div> 
            
            <div class="box-body">
                <div class="table-responsive"> 
                  <table class="table no-margin append-table" id="example2" style="font-size: 18px;"   >
                    <thead>
                      <tr>
                        <th>#</th>
                        <th class="text-center">Fullname</th>
                        <th class="text-center">Counting</th> 
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = "SELECT * from member_rigen Where approved != 'yes' order by id asc limit 30 ";
                    $query = mysqli_query( $conn, $query );
                    $ctr = 0;
                    $count = 0;
                    $first= true; 
                    
                      
                    while ( $rows = mysqli_fetch_assoc($query) ) {
                    
                        $ctr++;
                        $query2 = "SELECT  count(mark) as mark   from member_rigen where mark = '".$rows['id']."'  ";
                          $query2 = mysqli_query( $conn, $query2 );
                          $rows2 = mysqli_fetch_assoc($query2); 
                          if($rows['id']==1){
                            $mark= $rows2['mark'] - 1 ;  
                          }else{ 
                            $mark= $rows2['mark'] ; 
                          }   
                          $mark = 8 - $mark;  
                          if($mark == '0'){ 
                            $style = '<span class="label label-danger">';
                            $style_name = 'style="color: #dd4b39"';
                            // if($first){
                            //   echo "<script type='text/javascript'>$('.append-moretogo').append('0')</script>";
                            //   $first = false;
                            // }
                          }else{  
                            $style = '<span class="label label-success">';
                            $style_name = 'style="color: #00a65a"';
                            if($first){
                              echo "<script type='text/javascript'>$('.append-moretogo').html(".$mark.")</script>";
                            // echo "<script type='text/javascript'>$('.append-moretogo').html(' 0 ')</script>";
                              $first = false;
                            }
                          } 
                    ?>
                    <tr>
                      <td><?php echo $ctr; ?></</td>  
                      <td class="text-center" <?php echo $style_name; ?>> <?php echo $rows['name'] ?></td>
                      <td  class="text-center"> <?php echo $style; ?><?php echo $mark .' more to go.' ?> </span></td> 
                    </tr>
                   <?php   
                    }
                     
                   ?>
                    </tbody>
                  </table>
                </div> 
            </div> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-info">
            <div class="box-header with-border"> 
              <div class="col-md-12">
                <div class="box-tools pull-right "> 
                </div>
              </div> 
            </div>
              <div class=" text-center"> 
                <h1  >Recent Added Member</h1> 
              </div> 
            
            <div class="box-body">
                <div class="table-responsive"> 
                
                  <table class="table no-margin" style="font-size: 18px;">
                    <thead>
                    <tr> 
                    <th class="text-center">#</th> 
                      <th class="text-center">Name</th> 
                    </tr>
                    </thead>
                    <tbody >
                    <?php 
                    $ctr = 0 ;
                    $query = "SELECT * from member_rigen order by id DESC limit 30 ";
                    $query = mysqli_query( $conn, $query );  
                    while ( $rows = mysqli_fetch_assoc($query) ) { 
                    $ctr++;
                    ?>
                    <tr> 
                      <td><?php echo $ctr; ?></td>
                      <td class="text-center" style="color: #00a65a" > <?php echo $rows['name'] ?></td> 
                    </tr>
                   <?php  
                  
                    }
                     
                   ?>
                    </tbody>
                  </table>
                </div> 
            </div> 
          </div>  
        </div>
        
        </div>  
      <!-- /.row (main row) -->

    </section>
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
    $('.register').click(function(){
        window.location.href = "register.php";
    });
    $('.used_code').click(function(){
        window.location.href = "used-code.php";
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
    
     $('#loading').css("display","none");
    $('.form_checkName').submit(function(){
        var val = $('#inputcheck').val();  
        console.log(val);
        $('#loading').css("display","block"); 
        $.ajax({
            type : 'POST',
            url: 'function.php',
            datatype:'JSON',
            data:{
                action: "check_name_field",
                val : val, 
            }, 
            success: function(data){   
                $('#loading').css("display","none"); 
                $('.append-table').html('<thead> <tr><th>#</th> <th>ID</th> <th class="text-center">Name</th> <th class="text-center">Phone</th> <th class="text-center">Code</th> <th class="text-center">Date Encoded</th>   </tr> </thead> <tbody>' + data +  '</tbody> '); 
                // console.log('<thead> <tr> <th>#</th> <th class="text-center">Username</th> <th class="text-center">Counting</th> </tr> </thead> <tbody>' + data +  '</tbody> ');
            }
        });
         return false; 
    });
  });
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
