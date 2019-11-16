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
  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
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
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
  @media (min-width: 768px){ 
    .modal-dialog-pending {
      width: 300px;
      margin: 30px auto;
    } 
    
  }
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
        .navbar-static-top{
          display: none;
        }
      }
  </style>
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
      <!-- <h1> 
         
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>
    
    
    <!-- Main content -->
    <section class="content">
        
      <!-- Main row -->
      <div class="row">
          <div class="col-md-6  ">
           
        </div>
        <div class="col-md-6"> 
            <button class="btn btn-lg btn-primary btn-approve-all  pull-right " style="margin-bottom: 10px;" >Bulk Approve</button>  
        </div>
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Latest Orders</h3> -->
              <div class="text-center"><h2 class="  text-center">List of Request Payout</h2></div>
              <!-- <div class="box-tools pull-right">
                <button type="button"  class="btn btn-lg btn-success" data-toggle="modal" data-target="#generateCode"> Generate Code </button>
              </div> -->
            </div>

            <!-- /.box-header -->
            <div class="box-body">

                <div class="table-responsive">

                 <table class="table no-margin" style="font-size: 18px;">
                    <thead>
                    <tr>
                       <th>#</th> 
                      <th class="text-center">Fullname</th>
                      <th class="text-center">Phone</th> 
                      <th class="text-center">Counting</th>
                      <th   > <input type="checkbox" id="checkAll">  </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = "SELECT * from member_rigen Where approved != 'yes' order by id asc limit 10 ";
                    $query = mysqli_query( $conn, $query );
                    $ctr = 1;
                    $count = 0;
                    $first= true;
                   
                      
                    while ( $rows = mysqli_fetch_assoc($query) ) {
                        $query2 = "SELECT  count(mark) as mark   from member_rigen where mark = '".$rows['id']."'  ";
                          $query2 = mysqli_query( $conn, $query2 );
                          $rows2 = mysqli_fetch_assoc($query2); 
                          if($rows['id']==1){
                            $mark= $rows2['mark'] - 1 ;  
                          }else{ 
                            $mark= $rows2['mark'] ; 
                          }    
                          // $mark = 8 - $mark;  
                          if($mark == '8'){ 
                            $style = '<button class="btn btn-success btn-md btn-approve" data-phone="'.$rows['phone'].'" value="'.$rows['id'].'" data-toggle="modal" data-target="#modalApproveLong">Approve Payout</button>';
                            $style_name = 'style="color: #00a65a" ';
                            $disable = '';
                          }else{  
                            $style = '<button class="btn btn-danger btn-md" disabled >Approve Payout</button>';
                            $style_name = 'style="color: #dd4b39"';
                            $disable = 'disabled';
                            echo "<script type='text/javascript'>$('#checkAll').attr('disabled','disabled')</script>";
                          }
                    ?>
                    <tr>
                       <td><?php echo $rows['id']; ?></</td> 
                      <td class="text-center" <?php echo $style_name; ?>> <?php echo $rows['name'] ?></td>
                      <td class="text-center" <?php echo $style_name; ?>> <?php echo $rows['phone'] ?></td>
                      <td  class="text-center"> <?php echo $style; ?>  </td> 
                      <td> <input type="checkbox" class="checkbox" value="<?php echo $rows['id'] ?>" <?php echo $disable ?>> </td>
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
      </section>
        <!-- /.Left col -->
       
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- Modal -->
<div class="modal fade" id="generateCode" tabindex="-1" role="dialog" aria-labelledby="generateCodeLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="generateCodeLabel">Generate Code</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action=""> 
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              
                <div class="form-group">
                  <label  >Quantity</label>
                  <input type="text" class="form-control qty" name="code" placeholder="How many codes would you like to generate?"> 
                </div>  
              
              
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div> 
<div class="modal fade" id="modalApproveLong" tabindex="-1" role="dialog" aria-labelledby="modalApproveLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-pending modal-small" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="modalApproveLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure to approve ?
      </div>
      <div class="modal-footer">
          <input="hidden" name="phone" id="phonehidden" value="">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary  yes" data-phone="">Yes</button>
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
    $('.register').click(function(){
        window.location.href = "register.php";
    });
    
    $('.listmember').click(function(){
        window.location.href = "dashboard.php";
    });
    $('.used_code').click(function(){
        window.location.href = "used-code.php";
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
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    $('.btn-approve-all').click(function(){
         
        var checkedVal = $('.checkbox:checkbox:checked').map(function() {
            return this.value;
        }).get();
        console.log(checkedVal.join(","));
        $.ajax({
          type : 'POST',
          url: 'function.php',
          datatype:'JSON',
          data:{
            action: "approve_all_payout",
            checkedVal  : checkedVal
          },beforeSend: function() {    
                $('#loading').css('display', 'block');
              },
          
          success: function(data){ 
            $('#loading').css("display","none");
            location.reload(true);
             console.log(data);   
          }
        });
    });
    $('#loading').css("display","none");
    $('.btn-approve').click(function(){ 
        $('.yes').val($(this).val());
        console.log($(this).data('phone'));
        var phone = $(this).data('phone');
        $('#phonehidden').val( phone );
        console.log($('#phonehidden').val( ))
    });
    
    $('.yes').click(function(){ 
      var id = $(this).val();
      var phone = $('#phonehidden').val();
      console.log(phone);
      $.ajax({
          type : 'POST',
          url: 'function.php',
          datatype:'JSON',
          data:{
            action: "approve_payout",
            id : id,
            phone : phone
          },beforeSend: function() {    
                $('#loading').css('display', 'block');
              },
          
          success: function(data){ 
            $('#loading').css("display","none");
            if( data == "updated" ){
                location.reload(true);
            }

          }
        });
    });
    $('.submit').click(function(){
      var qty = $('.qty').val();
      $.ajax({
          type : 'POST',
          url: 'function.php',
          datatype:'JSON',
          data:{
            action: "generate_code",
            qty : qty
          },
          
          success: function(data){ 
            location.reload(true);

          }
        });
    });
  });
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
