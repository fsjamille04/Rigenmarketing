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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 
      <?php include 'header.php'; ?>
 
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       
    </section>
     
    <!-- Main content -->
    <section class="content">
        
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Latest Orders</h3> -->
              <div class="col-md-12">
                <div class="box-tools pull-right ">
                  <!-- <a type="button" href="register.php" class="btn btn-lg btn-primary"> Add Member</a> -->
                </div>
              </div> 
            </div>
              <div class=" text-center"> 
                <h1  >List of Rigen Member</h1> 
              </div> 
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">

                  <table class="table no-margin" id="example2" style="font-size: 18px;">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th class="text-center">Username</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Phone</th>
                      <th class="text-center">Code</th>
                      <th class="text-center">Date Created</th>
                      <!--<th class="text-center">Edit</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = "SELECT * from member_rigen ORDER BY id DESC LIMIT 200";
                    $query = mysqli_query( $conn, $query );
                    $ctr = 1;
                    $count = 0;
                    $first= true; 
                   if( $query->num_rows == 0 ){
                    echo "<script type='text/javascript'>$('.append-moretogo').append('0')</script>";
                   }
                      
                    while ( $rows = mysqli_fetch_assoc($query) ) {
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
                          }else{  
                            $style = '<span class="label label-success">';
                            $style_name = 'style="color: #00a65a"';
                            if($first){
                              echo "<script type='text/javascript'>$('.append-moretogo').append(".$mark.")</script>";
                              $first = false;
                            }
                          }
                    ?>
                    <tr>
                      <td><?php echo $rows['id']; ?></</td>  
                      <td class="text-center" > <?php echo $rows['username'] ?></td> 
                      <td class="text-center" > <?php echo $rows['name'] ?></td>
                      <td class="text-center" > <?php echo $rows['phone'] ?></td>
                      <td class="text-center" > <?php echo $rows['code'] ?></td>
                      <td class="text-center" > <?php echo $rows['date_created'] ?></td>
                      <!--<td><button class="btn btn-primary btn-md btn-edit"  value="<?php echo $rows['id'] ?>">Edit</button></td>-->
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
        <!-- /.Left col -->
       
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalApproveLabel" aria-hidden="true">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="modalApproveLabel">Edit</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body "> 
        <div class="form-group modal-editbody">
            <div class="row"> 
            </div>  
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button> -->
        <button type="button" class="btn btn-primary submit">Submit</button>
      </div>
    </div>
  </div>
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

    $('.btn-edit').click(function(){
      $('#loading').css('display', 'none');
      $('#modalEdit').modal('show');
      var id = $(this).val();
      $('.submit').val(id);    
      $.ajax({
        type : 'POST',
        url: 'function.php',
        datatype:'JSON',
        data:{
          action: "show_edit_member",
          id : id
        },beforeSend: function() {    
              $('#loading').css('display', 'block');
            },
        
        success: function(data){ 
          $('#loading').css("display","none");
          $('.modal-editbody').html('<div class="col-md-3"><label class="pull-right">Fullname</label></div><div class="col-md-9"><input class="form-control fullname" value="'+data+'"></div>')

        }
      });  
    });

    $('.submit').on('click',function(event){
      var id = $(this).val(); 
      event.preventDefault();
      var fullname = $('.fullname').val(); 
      $('#loading').css('display', 'block');
      $.ajax({
        type : 'POST',
        url: 'function.php',
        datatype:'JSON',
        data:{
          action: "update_fname",
          id : id,
          fullname : fullname
        },  
        success: function(data){ 
          console.log(data);
          $('#loading').css("display","none");
          if(data == 'error'){
            alert('error');  
          }else{
            location.reload(true); 
          }
        }
      });

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
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
