<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="icon" href="icon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Rigen Marketing | Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
  .login-form {
    width: 340px;
      margin: 90px auto;
  }
    .login-form form {
      margin-bottom: 15px;
        background: #FFFFFF;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    body{
      background: #f7f7f7;
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
        top: 30%;
        left: 43%;
        z-index: 100;
      }
      @media only screen and (max-width: 600px) {
        #loading-image {
          position: absolute;
          top: 30%;
          left: 22%;
          z-index: 100;
        }
      }
</style>
</head>
<body>
<div id="loading">
  <img id="loading-image" src="Spinner-1s-200px.gif" alt="Loading..." />
</div>
<div class="login-form">
    <form action="/examples/actions/confirmation.php" method="post">
        <h2 class="text-center">WELCOME</h2>   
        <img src="img/logo3.png" style="margin-bottom: 15px">    
        <div class="form-group">
            <input type="text" placeholder="Username" class="username form-control" required="" /> 
        </div> 
        <div class="form-group">
            <input type="password" placeholder="Password" class="password form-control" required="" /> 
        </div>        
        <div class="form-group">
        	<button type="submit" class="btn btn-primary btn-block" style="padding: 12px">Log in</button>
        </div>
       	 
    </form> 
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#loading').css("display","none");
		$('.login-form').submit(function(event){  
			$('#loading').css("display","block");
			event.preventDefault();
        		var username = $('.username').val();  
            var password = $('.password').val();   
  	      	$.ajax({ 
		        type : 'POST', 
		        url: 'function.php', 
		        datatype:'JSON', 
		        data:{ 
		          action: "branch_login", 
		          username : username, 
              password : password  
		        }, 
		        success: function(data){   
	        		$('#loading').css("display","none");
		          	if(data == 'success'){ 
			            window.location.href = 'dashboard-branch.php'; 
		          	}else{ 
			            alert('Username not exist'); 
		          	} 
	        	} 
	      	}); 
	      	return false;
	    }); 
  	}); 
</script>
</body>
</html>                                                               