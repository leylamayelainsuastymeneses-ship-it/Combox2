<?php

//get data base connection
require('config/database.php');
//get data from html form (client)
$f_name = $_POST['firstname'];
$l_name = $_POST['lastname'];
$m_phone = $_POST['phone'];
$e_mail = $_POST['email'];
$p_assword = $_POST['pswd'];
$pass_enc = md5($p_assword);

//prepare query
$sql="
 INSERT INTO users(
 firstname, lastname, mobile_phone, email, password
 )
 VALUES(
  '$f_name','$l_name','$m_phone','$e_mail','$pass_enc'
  )
  ";
  $local_res = pg_query($local_conn, $sql);
  $supa_res = pg_query($supa_conn, $sql);
  
 if (!$local_res){
    echo "User has been created successfully into local database!!!";
 } else{
    echo "User hasn't been created into local database !!!";
 }
 
  if (!$supa_res){
    echo "User has been created successfully into supa database!!!";
 } else{
    echo "User hasn't been created into supa database !!!";
 }
 
 echo "<script>('User hasn't been created successfully :::')</script>";
 HEADER('refresh:0;url=login.html');

?>
