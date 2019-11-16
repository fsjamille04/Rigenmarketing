<?php include 'dbconnect.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rigen Marketing | Register</title>
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

 
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php  include 'header.php'; 
      
     
      ?>
 
  
    <!-- /.sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!--< h1>
        Register
        <small>Control panel</small>
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 col-md-offset-3 connectedSortable">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal " id="reg-mem" method="post" action="" style="padding: 20px 10px;">
              <div class="col-md-12" style="margin-bottom: 15px;">
                <h1 class="text-center">Member Registration</h1>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputText" class="col-sm-3 control-label">Username</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control username" name="username" id="inputUsername" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputText" class="col-sm-3 control-label">Name</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control fullname" name="fullname" id="inputName"   placeholder="Name" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPhone"   class="col-sm-3 control-label">Phone Number</label>

                  <div class="col-sm-9">
                    <input type="text"   class="form-control phone" name="phone" id="inputPhone" placeholder="Phone" required="">
                  </div>
                </div>
                <!--<div class="form-group">-->
                <!--  <label for="inputCode" class="col-sm-3 control-label">Quantity of Code</label>-->

                <!--  <div class="col-sm-9">-->
                <!--    <input type="text" class="form-control  quantity" name="quantity" id="inputQuantity" placeholder="Quantity">-->
                <!--  </div>-->
                <!--</div>-->
                <div class="form-group append-code">
                  <label for="inputCode" class="col-sm-3 control-label  ">Code</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control  code" name="code" id="inputCode" placeholder="Code" required="">
                  </div> 
                </div>
                
                <div class="form-group">
                  <label for="inputCode" class="col-sm-3 control-label">Gender</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control  gender" name="gender" id="inputGender" placeholder="Gender" >
                  </div>
                </div>

                 
                <div class="form-group">
                  <label for="inputCode" class="col-sm-3 control-label">Email Adddress</label>

                  <div class="col-sm-9">
                    <input type="email" class="form-control  " name="" id="input" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputCode" class="col-sm-3 control-label">Present Address</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control  " name="" id="" placeholder="Address">
                  </div>
                </div>
 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <button type="submit" class="btn btn-primary btn-lg pull-right" name="submit">Submit</button>
              </div>
              <!-- /.box-footer -->
               
            </form>
          </div>

        </section>
        <!-- /.Left col -->
       
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
<script type="text/javascript">
  $(document).ready(function(){
    function phoneInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[0-9]/i);
       return pattern.test(value);
    }

    $('#inputPhone').bind('keypress', phoneInput);
    function nameInput(event) {
         var value = String.fromCharCode(event.which);
         var pattern = new RegExp(/[a-zåäö ]/i);
         return pattern.test(value);
    }
    
    // $('#inputName').bind('keypress', nameInput);  
      
      
    $('#loading').css("display","none");
    $('.code').change( function(){
        // $('#loading').css('display', 'block');
        var val = $('#reg-mem').find($(this).val());
        console.log(val);
        // $.ajax({
        //   type : 'POST',
        //   url: 'function.php',
        //   datatype:'JSON',
        //   data:{
        //     action: "check_code_before_submit",
        //     val : val, 
        //   }, 
        //   success: function(data){  
        //     $('#loading').css("display","none");
        //     // location.reload(true);
        //     console.log(data);
            

        //   }
        // });
    });
    // $('.quantity').on('change',function(){
    //   $('.append-code').html("");
    //   qty = $(this).val(); 
    //   for(var i = 0; i < qty; i++){
    //     code1 = $('.append-code').append('<label for="inputCode" class="col-sm-3 control-label">Code</label> <div class="col-sm-9"> <input type="text" class="form-control  code" name="code" id="inputCode" placeholder="Code">  </div>'); 
    //   }
    // });
    $('#reg-mem').submit(function(){
      var username = $('.username').val();
      var name = $('.fullname').val();
      var phone = $('.phone').val();
      var code = $('.code').serialize();
      var code = $('.code').val(); 
    //   var code1 = [];
    //   for(var i = 0; i < code.length; i++){
    //     code1[i] = $(code[i]).val(); 
    //   }
    //   alert(cod);
    //   code  = JSON.stringify(code1);
      var quantity = $('.quantity').val();
          $.ajax({
              type : 'POST',
              url: 'function.php',
              datatype:'JSON',
              data:{
                action: "register_member",
                name : name,
                phone : phone,
                code : code,
                // username : username,
                // quantity : quantity
              },beforeSend: function() {    
                $('#loading').css('display', 'block');
              },
              success: function(data){  
                // $('#loading').css("display","none");
                // location.reload(true);
                console.log(data);
                if( data.indexOf('3') > -1 ){
                  window.location.href = 'dashboard.php';
                }else if( data == '2' ){
                  alert('Code is already used');
                }else{
                  alert('error');
                  $('#loading').css("display","none");
                }

              }
            });
      return false;
    });
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
  });
  
</script>
</body>
</html>
