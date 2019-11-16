<?php include 'dbconnect.php';

echo $_SERVER['REMOTE_ADDR'];


?>
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

      /* Important part */
      #generateCodetable .modal-dialog{
          overflow-y: initial !important
      }
      #generateCodetable .modal-body{
          height: 250px;
          overflow-y: auto;
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

  
  <?php  session_start();

    if ( !isset( $_SESSION['user_gen'] ) ) {
        header("Location: gencode-login.php");

    } ?> 
    <header class="main-header">

        <!-- Logo -->

        <a href="index.html" class="logo">

          <!-- mini logo for sidebar mini 50x50 pixels -->

          <span class="logo-mini"><b>A</b>LT</span>

          <!-- logo for regular state and mobile devices -->

          <span class="logo-lg"><b>Rigen</b>Marketing</span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <li class="logout-btn">
                <a href="logout-gen.php" data-toggle="control-sidebar"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>

        </nav>

      </header>

      <!-- Left side column. contains the logo and sidebar -->

      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar">

          <!-- Sidebar user panel -->

          <div class="user-panel">

            <div class="pull-left image">

              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            </div>

            <div class="pull-left info">

              <p>Admin</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

            </div>

          </div>

          <!-- search form -->

          <form action="#" method="get" class="sidebar-form">

            <div class="input-group">

              <input type="text" name="q" class="form-control" placeholder="Search...">

              <span class="input-group-btn">

                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

                    </button>

                  </span>

            </div>

          </form>

    <ul class="sidebar-menu" data-widget="tree">

      <li class="header">MAIN NAVIGATION</li>

      <li class=" treeview add-branch">

        <a href="#">

          <i class="fa fa-plus"></i> <span>Add Branch</span>

        </a> 

      </li>

      <!--<li class=" treeview gencode">-->

      <!--  <a href="#">-->

      <!--    <i class="fa fa-code"></i> <span>Generate Code</span>-->

      <!--  </a> -->

      <!--</li>-->
      <?php 
      $query2   = "SELECT * FROM branches ";
      $query2   = mysqli_query( $conn , $query2 );
      while( $rows2    = mysqli_fetch_assoc( $query2 ) ){  ?>
      <li class=" treeview branch" value="<?php echo $rows2['id'] ?>" data-name="<?php echo $rows2['name'] ?>">

        <a href="#">

          <i class="fa fa-home"></i> <span><?php echo strtoupper($rows2['name']) ?></span>

        </a> 

      </li>  
      <?php }
      ?>
    </ul>



     </aside>
 
 

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
          $query1 = "SELECT  count(code) as code   from gecode where stat != 'used' and branch = ".$_GET['id']."";
          $query1 = mysqli_query( $conn, $query1 );
          $rows1 = mysqli_fetch_assoc($query1);
          echo ( isset( $rows1['code'] ) ) ?  $rows1['code']  : '0' ;
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
          $query1 = "SELECT  count(code) as code   from gecode where stat = 'used' and branch = ".$_GET['id']." ";
          $query1 = mysqli_query( $conn, $query1 );
          $rows1 = mysqli_fetch_assoc($query1);
          echo ( isset( $rows1['code'] ) ) ?  $rows1['code']  : '0' ;
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
          $query1 = "SELECT  count(code) as code   from gecode Where branch = ".$_GET['id']." ";
          $query1 = mysqli_query( $conn, $query1 );
          $rows1 = mysqli_fetch_assoc($query1);
          echo ( isset( $rows1['code'] ) ) ?  $rows1['code']  : '0' ;
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
          <div class=" pull-right  " style="margin-bottom: 10px;">
              <button type="button"  class="btn btn-lg btn-primary" data-toggle="modal" data-target="#generateCode"> Generate Code </button>
            </div>
        </div>
        <div class="col-md-12"> 
          <div class="box box-info marg-top" style="">

            <div class="box-header with-border">
              <!-- <h3 class="box-title">Latest Orders</h3> -->
              <?php 
              $query5   = "SELECT name FROM branches where id = ".$_GET['id'].""; 
              $query5   = mysqli_query( $conn , $query5 );
              $rows5    = mysqli_fetch_assoc( $query5 ) ;
              
              ?>
              <div class="text-center"><h2 class="list-codes  text-center">List of Generate Codes <?php echo $rows5['name'] ?></h2></div>
              
            </div>
            <?php 
                if( !isset($_GET['id']) ){ ?>
                    <h4 class="text-center" style="padding: 100px; color: red"> Select Branch Menu </h4>
            <?php }else{
                
            ?>
            <!-- /.box-header -->
            <div class="box-body">
                <input type="hidden" id="hidden-branch" name="branch-hidden" value="<?php echo $_GET['id'] ?>">
                <div class="table-responsive">

                  <table class="table no-margin" style="font-size: 18px;">
                    <thead>
                    <tr>
                      <!-- <th>#</th> -->
                      <th  >#</th>
                      <th class="text-center">Unique Codes</th> 
                      <th class="text-center">Copy</th> 
                    </tr>
                    </thead>
                    <tbody id="append-tbody"><?php 
                    $ctr = 0;
                    $query = "SELECT * from gecode where branch = ".$_GET['id']."";
                    $query = mysqli_query( $conn, $query );  
                    
                    while ( $rows = mysqli_fetch_assoc($query) ) {  
                      if( $rows['copy'] === '1' ){
                        $style = "style = 'color: red'";
                        $val = 'Already Copy'; 
                      }else{
                        $style = "";
                        $val = '';
                      }
                      if( $rows['stat'] != 'used' ){
                        $ctr++; ?>
                        <tr <?php echo $style ?> > 
                          <td  ><?php echo $ctr ?></td> 
                          <td class='text-center'><?php echo $rows['code'] ?></td> 
                          <td class='text-center'  ><?php echo  $val ?></td> 
                        </tr>  
                     <?php }
                        
                    }
                    ?></tbody>
                  </table>
                </div> 
            </div> 
            <?php } ?>
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


  <!-- Modal -->
<div class="modal fade" id="generateCodetable" tabindex="-1" role="dialog" aria-labelledby="generateCodeLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="generateCodeLabel">Generated Code</h3>
       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form method="post" action=""> 
        <div class="modal-body">
          <div class="row"> 
            <input type="hidden"  id="append-codes-hidden">
            <div class="col-md-12 append-codes text-center">
               
            </div>
          </div>
        </div>
        <div class="checkbox text-center">
          <label><input type="checkbox" id="copied_check" value="">Check this if you already copy the codes</label>
        </div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-primary copied-btn" disabled>Done</button>
        </div>
      </form>
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
    
    $('#copied_check').prop('checked', false);
    $('input[type="checkbox"]').click(function(){
      if($(this).prop("checked") == true){
          $('.copied-btn').removeAttr('disabled');
      }
      else if($(this).prop("checked") == false){
          $('.copied-btn').attr('disabled','disabled');
      }
    });
    $('.copied-btn').click(function(){
      var codes = $('#append-codes-hidden').val();
      $('#loading').css('display', 'block');
      $.ajax({
        type : 'POST',
        url: 'function.php',
        datatype:'JSON',
        data:{
          action: "generate_code_copied",
          codes : codes, 
        }, 
        success: function(data){ 
          console.log(  data  );
           if(data.indexOf("success") >= 0){
            $('#generateCodetable').modal('hide');
            location.reload(true);
           } 
        }
      });
    });
    $('.submit').click(function(){
      $('#generateCode').modal('hide');
      var branch = $('#hidden-branch').val();
      var qty = $('.qty').val();
      $.ajax({
          type : 'POST',
          url: 'function.php',
          datatype:'JSON',
          data:{
            action: "generate_code",
            qty : qty,
            branch : branch
          },beforeSend: function() {    
            $('#loading').css('display', 'block');
          }, 
          success: function(data){ 
            console.log( JSON.parse(data).codes );
            $('#append-codes-hidden').val(JSON.parse(data).codes);
            $.each( JSON.parse(data).codes, function( key, value ) {
              console.log( key + ": " + value );
              $('.append-codes').append("<h4>"+value+"</h4>")
            });
            $('#loading').css("display","none");  
            $('#generateCodetable').modal({backdrop: 'static',
                        keyboard: true, 
                        show: true});
            // location.reload(true);

          }
        });
    });

    $('.branch').click(function(){ 
        var id = $(this).val(); 
        window.location.href = "http://localhost/rigen/generatecode.php?id="+id;
    });
    $('.add-branch').click(function(){
        window.location.href = "add-branch.php";
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
    


    // $('.branch').click(function(){
    //   var id = $(this).val(); 
    //   $('#hidden-branch').val(id);
    //   $('#append-tbody').html("");
    //   $('.remaining').html("");
    //   $('.all').html("");
    //   $('.used').html("");
    //     // window.location.href = 'generatecodehttp://rigenmarketing.com/generatecode.php'+"?id="+id ;
    //     // window.location = url;
    //   $.ajax({
    //     type : 'POST',
    //     url: 'function.php',
    //     datatype:'JSON',
    //     data:{
    //       action: "select_branch",
    //       id : id
    //     },beforeSend: function() {    
    //       $('#loading').css('display', 'block');
    //     }, 
    //     success: function(data){ 

    //       $('#loading').css("display","none");
    //       // location.reload(true);
    //     //   var data = JSON.parse(data);
    //     //   console.log(JSON.parse(data).name);
    //       $('#append-tbody').append(JSON.parse(data).name);
    //       $('.remaining').append(JSON.parse(data).remain);
    //       $('.all').append(JSON.parse(data).all);
    //       $('.used').append(JSON.parse(data).used);
    //     }
    //   });
    // });
  });
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
