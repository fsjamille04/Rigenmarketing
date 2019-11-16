<?php
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
//   header('Content-Type: application/vnd.ms-excel');  
//   header('Content-disposition: attachment; filename=download.xls');  
 
  echo $output;