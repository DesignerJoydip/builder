<style>
*{ outline:none; box-sizing:border-box; -webkit-box-sizing:border-box; -moz-box-sizing:border-box; }
body{ 
	background:#242e38; 
}
.login_box{
	width:100%; max-width:500px; position:fixed; left:0; right:0; display:block; margin:0px auto; top:50%; transform:translate(0px, -50%); -webkit-transform:translate(0px, -50%); -moz-transform:translate(0px, -50%);
}
#success__para{
	/*position:absolute; top:-30px; left:0px; color:#fff; font-size:14px; width:100%; text-align:center;*/
}
.Loading{
	width:100%; height:100%; position:absolute; top:0; left:0; background:rgba(36,46,56,0.6) url(login/loading.gif) no-repeat center center; background-size:contain; z-index:9;
}
.login_box input[type=text],
.login_box input[type=password]{
	width:100%; float:left; height:40px; padding:10px; background:transparent; border:none; border-bottom:#546e85 solid 2px; margin:0px 0px 20px 0px; font-size:16px; color:#407cb5;
}
.login_box input[type=button]{
	width:100%; height:40px; background:#16a086; border-radius:50px; -webkit-border-radius:50px; color:#fff; font-weight:600; font-size:18px; border:none; margin-top:20px;
}
.loginHeading{
	width:100%; float:left; color:#fff; font-size:22px;
}
.loginHeading small{
	height:15px; width:100%; display:inline-block;
}
</style>







<div class="login_box">
<div class="Loading"></div>


<h2 class="loginHeading">
<span>USER LOGIN</span><br>
<small><span id="success__para"></span></small>
</h2>


<div class="form_field_row">
<input type="text" class="field_style" id="name_of_user" placeholder="user ID">
</div>
<div class="form_field_row">
<input type="password" class="field_style" id="pass_of_user" placeholder="Password">
</div>
<div class="form_field_row">
<input name="" type="button" id="log_button" class="button button-block button-purple" value="Login">
</div>



</div>

<script>



function submitdata(){
	var name_of_user = $("#name_of_user").val();
	var pass_of_user = $("#pass_of_user").val();
	
	$(".Loading").fadeIn(500);
	$("#success__para").hide();
	
	$.post( "login/login-action.php", { name_of_user:name_of_user, pass_of_user:pass_of_user}, function(data){
		$(".Loading").fadeOut(500);
		$("#success__para").delay(500).fadeIn(500).html(data);
		$("#success__para").delay(2000).fadeOut(500);
		return false;
	});
}


$(window).keypress(function(e){
        if(e.which == 13){//Enter key pressed
          submitdata();
		}
});



$(document).ready(function(){
$("#success__para").hide();
$(".Loading").hide();	
$("#log_button").click(function(){	
 submitdata();
});

});

</script>

