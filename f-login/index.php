<?php
//awebthgj_yt
session_start();
?>
<html>
	<head>
		
	</head>
	<body>
		
	<script>
	  window.fbAsyncInit = function() {
		FB.init({
		  appId      : '440990667175749',
		  cookie     : true,
		  xfbml      : true,
		  version    : 'v3.1'
		});
		FB.AppEvents.logPageView();   
	  };

	  (function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "https://connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	   
	   function fbLogin(){
			FB.login(function(response){
				if(response.authResponse){
					fbAfterLogin();
				}
			});
	   }
	   
	   function fbAfterLogin(){
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {   // Lo
				FB.api('/me', function(response) {
				  jQuery.ajax({
					url:'check_login.php',
					type:'post',
					data:'name='+response.name+'&id='+response.id,
					success:function(result){
						window.location.href='index.php';
					}
				  });
				});
			}
		});
	   }
</script>
<?php
if(isset($_SESSION['FB_ID']) && $_SESSION['FB_ID']!=''){
	echo 'Welcome '.$_SESSION['FB_NAME'];
	echo "<br/>";
	?>
	<a href="logout.php">Logout</a>
	<?php
}else{
?>
<a href="javascript:void(0)" onclick="fbLogin()">Login with Facebook</a>
<?php } ?>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	</body>
</html>