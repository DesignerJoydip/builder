<?php
ob_start();
session_start();
if( isset( $_POST['name_of_user'], $_POST["pass_of_user"]) ) {
  $name_of_user = $_POST['name_of_user'];
  $pass_of_user = $_POST['pass_of_user'];
  
  $real_user_name = "admin";
  $real_user_pass = "admin";
  
  //echo "Wrong username or password";
  
  if($name_of_user==$real_user_name and $pass_of_user==$real_user_pass){
	  $_SESSION['login_user']=$real_user_name;
	  echo "Welcome ".$_SESSION['login_user'];
	  ?>
      <script>
	  
	  setTimeout(function(){
			window.location.href = "index.php";
		},2000);
 
 </script>
<?php
  }else{
	  echo "wrong username or password"; 
  }
  
  
  
  
  die();
}
?>