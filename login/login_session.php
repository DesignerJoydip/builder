<?php
session_start();
if(isset($_SESSION['login_user'])){
if($_SESSION['login_user']==''){
	echo $_SESSION['login_user'];
session_destroy();
header('Location:index.php');
?>
<script>
 window.location.href = "index.php";
 </script>
<!--header('Location:index.php');-->
<?php
}}
?>
<!--<script>
 window.location.href = "index.php";
 </script>-->