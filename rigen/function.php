<?php 


if( isset( $_POST['action'] ) ){ 
	$function = $_POST['action']; 
	$function(); 
}

function generate_code(){ 
  include 'dbconnect.php'; 
  $qty = $_POST['qty'];
  $branch = $_POST['branch'];
  $code_ar = array();
  // $last_id = array();
  for ( $i = 1 ; $i <= $qty ; $i++ ) { 
    $code  = bin2hex ( random_bytes( 10 ) ); 
    $code_ar[] = $code;
    $sql   =$conn->query(  "INSERT INTO gecode ( code,stat,branch ) VALUES ( '$code','','$branch')" );  

    // $last_id[] = $conn->insert_id;
  } 
  echo json_encode( array ( 'success' => "Success", 'codes' => $code_ar ) );  
}

function generate_code_copied(){
  include 'dbconnect.php'; 
  $codes = explode(",",$_POST['codes']);
  foreach ($codes as $key => $code) {
    $sql =  "UPDATE gecode SET copy = 1 WHERE code = '$code'"  ; 
    if ( $conn->query( $sql ) === TRUE ) { 
      echo "success";
    }
  } 
}

function check_member_login(){
	include 'dbconnect.php';
	session_start(); 
	$phonenumber = preg_replace( '/\s+/', '', $_POST['phonenumber'] );
	
	$query1   = "SELECT id,phone FROM member_rigen    ";
    $query1   = mysqli_query( $conn , $query1 );
    while ( $rows1 = mysqli_fetch_assoc( $query1 ) ){  
        if( str_replace(' ', '', $rows1['phone'] ) == $phonenumber ){ 
            $id = $rows1['id']; 	
        }
    }  
	$query2   = "SELECT phone FROM member_rigen WHERE id = '" . $id . "' "; 
  $query2   = mysqli_query( $conn , $query2 );
  $rows2    = mysqli_fetch_assoc( $query2 );
  if(isset($rows2)){
    $_SESSION['user_member']=$rows2['phone'];
    echo "success";
  }else{
    echo "User or Password not match";
  } 
}

function approve_payout(){
	include 'dbconnect.php';
	$id  = $_POST['id'] ;
	$sql = "UPDATE member_rigen SET approved='yes' WHERE id='" . $id . "'" ;
 
	if ( $conn->query( $sql ) === TRUE ) {
	    $ch = curl_init();
        $parameters = array(
            'apikey' => '7e74fb5505c0a05729bd566eadaaaa05', //Your API KEY
            'number' => str_replace(' ', '', $_POST['phone'] ) ,
            'message' => "Good day to our valued Rigen clients! We are happy to inform you that you are now qualified for pay out ".Date('y:m:d', strtotime("+3 days"))." at main office(Infront of Grandmall). Kindly bring your valid ID and acknowledgement receipt/form. Thank you and Happy earnings!, CONGRATULATIONS!",
            'sendername' => 'SEMAPHORE'
        );
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        
        //Send the parameters set above with the request
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
        
        // Receive response from server
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);
	 echo "updated";
	} else {
	 echo "Error updating record: " . $conn->error;
	}
}

function register_member(){

  date_default_timezone_set('Asia/Manila'); 
  include 'dbconnect.php';
  $mark = 0;
  $name = $_POST['name']; 
  $approved = 'no';  
  $phone = $_POST['phone'];  
  $code = $_POST['code'];  
  $query3 = "SELECT * FROM gecode WHERE code = '" . $code . "' and stat != 'used' ";
    $query3 = mysqli_query( $conn, $query3 );
    $rows3 = mysqli_fetch_assoc( $query3 );
    
    if( !isset( $rows3 ) && $rows3 == '' ){
      echo '1'; // not match
    }elseif( $rows3['stat'] == 'used' ){
      echo '2'; //used
    }else{   
        
      // for ( $i = 1 ; $i <= $quantity ; $i++ ) { 
      $query2 = "SELECT counting,mark FROM member_rigen ORDER BY ID DESC LIMIT 1  ";
      $query2 = mysqli_query( $conn, $query2 );
      $rows2 = mysqli_fetch_assoc( $query2 ); 
      if( $rows2['counting'] == 8 ){
        $counting = 1;
        $mark = $rows2['mark'] + 1;
      }elseif($rows2['mark'] == ''){
        $mark = 1;
        $counting = 0;
      }else{
        $counting = $rows2['counting'] + 1 ;
        $mark = $rows2['mark'] ;
      } 
      $sql = "INSERT into member_rigen (name,phone, code,approved, mark, counting,payout,date_created) Values ('$name','$phone','".$code."','$approved','$mark','$counting','', '".date('y-m-d')."')" ;  
       
      if ( $conn->query( $sql ) === TRUE ) {   
        $conn->query( "UPDATE gecode SET stat = 'used' WHERE code = '".$code."' " ); 
        echo "3";
        
        $ch = curl_init();
        $parameters = array(
            'apikey' => '7e74fb5505c0a05729bd566eadaaaa05', //Your API KEY
            'number' => str_replace(' ', '', $_POST['phone'] ) ,
            'message' => "Congratulations ".$name."! You are now registered at RIGEN Marketing . Your unique code is ".$code." ",
            'sendername' => 'SEMAPHORE'
        );
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        
        //Send the parameters set above with the request
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
        
        // Receive response from server
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);
      } else {
        echo '4';//error
      }   
    } 
}


function payout(){

  include 'dbconnect.php';
  $query = "SELECT * from member_rigen  Where approved  = 'yes'  "; 
  $query = mysqli_query( $conn, $query ); 
  $output = '';
  $output .= ' <table class="table" bordered="1">  
                    <tr>  
                         <th>#</th>  
                         <th>Fullname</th>  
                         <th>Phone</th>  
       <th>Code</th>
       <th>Date Created</th>
                    </tr>
  ';
  while ( $rows = mysqli_fetch_assoc($query) ) { 
   $output .= '
    <tr>  
                         <td>'.$rows["id"].'</td>  
                         <td>'.$rows["name"].'</td>  
                         <td>'.$rows["phone"].'</td>  
       <td>'.$rows["code"].'</td>  
       <td>'.$rows["date_created"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
}

function admin_login(){
  include 'dbconnect.php';
  session_start(); 
  $user = $_POST['user'];
  $pass = $_POST['pass'];  
  $query2 = "SELECT *  from admin  Where admin = '".$user."' and password = '".$pass."' and role ='administrator' ";
  $query2 = mysqli_query( $conn, $query2 );
  $rows2 = mysqli_fetch_assoc($query2) ; 
  if(isset($rows2)){
    $_SESSION['user']=$rows2['id'];
    echo "success";
  }else{
    echo "User or Password not match";
  } 
}

function gencode_login(){
  include 'dbconnect.php';
  session_start(); 
  $user = $_POST['user'];
  $pass = $_POST['pass'];  
  $query2 = "SELECT *  from admin  Where admin = '".$user."' and password = '".$pass."' and role = 'generator' ";
   
  $query2 = mysqli_query( $conn, $query2 );
  $rows2 = mysqli_fetch_assoc($query2) ; 
  if(isset($rows2)){
    $_SESSION['user_gen']=$user;
    echo "success";
  }else{
    echo "User or Password not match";
  } 
}

function select_date(){ 
  include 'dbconnect.php';
  $date = $_POST['date']; 
  $newdate = date_format (new DateTime($date), 'Y-m-d'); 
  $query = "SELECT * from member_rigen Where approved  = 'yes' and date_created = '".$newdate."'  ";
  $query = mysqli_query( $conn, $query ); 
  $output =''; 
  while ( $rows = mysqli_fetch_assoc($query) ) { 
    $output .= "<tr>".
                "<td>".$rows['id']."</td>".
                "<td class='text-center'>".$rows['name']."</td>".
                "<td class='text-center'>".$rows['phone']."</td>".
              "</tr>";

  }
  if( $output != '' && $output != null ){
    echo $output; 
  } else{
    echo 'error';
  }
}

function show_edit_member(){
  include 'dbconnect.php';
  $id = $_POST['id'];

  $query = "SELECT name from member_rigen WHERE id = '".$id."'  "; 
  $query = mysqli_query( $conn, $query ); 
  $rows = mysqli_fetch_assoc($query); 
  echo $rows['name'] ;
}

function update_fname(){
  include 'dbconnect.php';
  $id = $_POST['id'];
  $fullname = $_POST['fullname'];
  $sql = "UPDATE member_rigen SET name='".$fullname."' WHERE id='" . $id . "'" ;
  if ( $conn->query( $sql ) === TRUE ) {

   echo "updated";
  } else {
   echo "error";
  }
}

function select_branch(){
  include 'dbconnect.php';
  $id = $_POST['id']; 

  $query = "SELECT * from gecode where branch = '$id'";
  $query = mysqli_query( $conn, $query );    
  $count_remain = 0;
  $count_used = 0;
  $count_all = 0;
  while ( $rows = mysqli_fetch_assoc($query) ) { 
        if( $rows['stat'] != 'used' ){
          $ctr++;
          $output .= "<tr>". 
            "<td class='text-center'>".$ctr."</td>".
            "<td class='text-center'>".$rows['code']."</td>".
          "</tr>";
          
            $count_remain++ ;
        }
        if( $rows['stat'] == 'used' ){
            
            $count_used++;
        }
        $count_all++;
  }
  if( $output != '' && $output != null ){
    echo json_encode( array ('name' => $output, 'remain'=>$ctr, 'used'=>$count_used, 'all'=>$count_all) ); 
  } else{
    echo 'No Data';
  }
}

function register_branch(){
  include 'dbconnect.php';
  $name = $_POST['name'];   
  $sql   = "INSERT INTO branches ( name ) VALUES ( '$name')" ;   
    if ( $conn->query( $sql ) === TRUE ) {  
      echo "Success";    
    } else { 
      echo "Error "; 
    }   
}


function payout_approve(){
  include 'dbconnect.php';
  $id = $_POST['id']; 
  $admin = $_POST['admin']; 
  print_r($_POST);
  $sql = "UPDATE member_rigen SET admin_id='$admin' WHERE id='$id' " ;
  if ( $conn->query( $sql ) === TRUE ) {
   echo "updated";
  } else {
   echo "error";
  }
}

function approve_all_payout(){
    include 'dbconnect.php';
    $id = $_POST['checkedVal'];   
    // print_r($_POST); 
    $sql = "UPDATE member_rigen SET approved='yes' WHERE id IN (".implode(',',$id).")"; 
	if ( $conn->query( $sql ) === TRUE ) {
	 echo "updated";
	} else {
	 echo "error";
	}
}


function check_used_code(){
    include 'dbconnect.php';
    $id = $_POST['id']; 
    
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
}


function check_name_field(){ 
    include 'dbconnect.php';
    $val = $_POST['val']; 
    
    // $query1 = "SELECT * from member_rigen where name LIKE '%$val%' || phone LIKE '%$val%' ";  
    //SELECT *, ( SELECT g.branch from gecode g where g.code = m.code ) as gebranch, (SELECT b.name from branches b WHERE b.id = gebranch) as branch from member_rigen m where m.name LIKE '%$val%' || m.phone like '%$val%' 
    
    $query1 = "SELECT * from member_rigen where name LIKE '%$val%' || phone LIKE '%$val%' || code LIKE '%$val%' ";  
    echo $query1;
    $query1 = mysqli_query( $conn, $query1 ); 
    $ctr = 0;
    while ( $rows1 = mysqli_fetch_assoc($query1) ) { 
        $ctr++;
        $output .= "<tr>". 
        "<td class='text-center'>".$ctr."</td>".
        "<td class='text-center'>".$rows1['id']."</td>".
        "<td class='text-center'>".$rows1['name']."</td>".
        "<td class='text-center'>".str_replace(' ', '', $rows1['phone'] )."</td>".
        "<td class='text-center'>".$rows1['code']."</td>". 
        "<td class='text-center'>".date("Y-m-d", strtotime($rows1['date_created']))."</td>".
        
        
        "<td class='text-center'>".$rows1['branch']."</td>".
      "</tr>";
      
    }
    echo $output; 
    
}



function branch_login(){
  include 'dbconnect.php';
  session_start(); 
  $username = $_POST['username']; 
  $password = $_POST['password'];  
  
  $query   = "SELECT * FROM branches WHERE user = '" . $username . "' and password ='".$password."'"; 

  $query2   = $conn->query( $query );
  
  $rows2    = mysqli_fetch_assoc( $query2 );
  if(isset($rows2)){
    $_SESSION['user_branch']=$rows2['id'];
    echo "success";
  }else{
    echo "User or Password not match";
  } 
}

function check_name_branch(){
  include 'dbconnect.php'; 
  $id = $_POST['id'];
  $val = $_POST['val'];
  $query1 = "SELECT *, ( SELECT g.branch from gecode g where g.code = m.code  and g.branch = '$id' ) as gebranch, (SELECT b.name from branches b WHERE b.id = gebranch) as branch from member_rigen m where m.name LIKE '%$val%' || m.phone like '%$val%' || m.code like '%$val%' ";  
    
     
    echo $query1;
    $query1 = mysqli_query( $conn, $query1 ); 
    $ctr = 0;
    while ( $rows1 = mysqli_fetch_assoc($query1) ) { 
      if( $rows1['branch'] != '' ){
        $ctr++;
        $output .= "<tr>". 
        "<td class='text-center'>".$ctr."</td>".
        "<td class='text-center'>".$rows1['name']."</td>".
        "<td class='text-center'>".str_replace(' ', '', $rows1['phone'] )."</td>".
        "<td class='text-center'>".$rows1['code']."</td>". 
        "<td class='text-center'>".date("Y-m-d", strtotime($rows1['date_created']))."</td>".
        
        
        "<td class='text-center'>".$rows1['branch']."</td>".
      "</tr>";
      } 
    }
    echo $output; 
    
}
