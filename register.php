<?php include "includes/config.php"  ?>

<?php  include "includes/classes/Account.php"  ?>
<?php  include "includes/classes/Constants.php"  ?>
<?php   $account= new Account($conn);  ?>



<?php  include "includes/handlers/login-handler.php"  ?>
<?php  include "includes/handlers/register-handler.php"  ?>
   
   <?php function getInputvalue($name){
        if(isset($_POST[$name])){
        	echo $_POST[$name];
        }

   }  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to slotify!!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>

	<?php 

       if(isset($_POST['registerButton'])){

       	  echo '<script>


	$(document).ready(function() {

       	$("#loginForm").hide();
		$("#registerForm").show();
	});
		

	</script> ';
       }
        else {
	echo '<script>


	$(document).ready(function() {

       	$("#loginForm").show();
		$("#registerForm").hide();
	});
		

	</script> ';
}

	?>

		<div id="background">
		<div id="loginContainer">

						<div id="inputContainer">
							<form id="loginForm" action="register.php" method="POST">

								<h2>Login to your Account</h2>

								<p>
                                   <span class="errorMessage"><?php echo $account->geterror(Constants::$loginFailed); ?> </span>
								
									<label for=loginUsername>UserName</label>
					               <input id="loginUsername" type="text" name="loginUsername" placeholder="e.g.AkashDixit" required  value="<?php getInputvalue('loginUsername') ; ?>"></p>
								
					            <p>  <label for=loginPassword>Password</label>
					        		 <input id="loginPassword" type="password" name="loginPassword"  placeholder="your password" required></p>
					        
					        <button type="submit" name="loginButton">LOG IN</button>
							   <div class="hasAccountText">
							   	  
							   	  <span id="hideLogin">Don't Account yet?Signup here.</span>
							   </div>

							 </form>

					         <form id="registerForm" action="" method="POST">

								<h2>Create your Free Account</h2>

								
								<?php echo $account->geterror(Constants::$usernameCharacters); ?>

								
								<?php echo $account->geterror(Constants::$usernameTaken); ?> 

								<p><label for=username>UserName</label>
					               <input id="username" type="text" name="username" placeholder="e.g.AkashDixit" value="<?php getInputvalue('username') ; ?>" required></p>

					                
								<?php echo $account->geterror(Constants::$firstNameCharacters); ?>
								<p><label for=firstname>FirstName</label>
					               <input id="firstname" type="text" name="firstname" placeholder="e.g.Akash" value="<?php getInputvalue('firstname') ; ?>" required></p>
					  
					             
								<?php echo $account->geterror(Constants::$lastNameCharacters); ?>
								<p><label for=lastname>LastName</label>
					               <input id="lastname" type="text" name="lastname" placeholder="e.g.Dixit" value="<?php getInputvalue('lastname') ; ?>" required></p>

					             
								<?php echo $account->geterror(Constants::$emailDoNoMatch); ?>

								<?php echo $account->geterror(Constants::$emailInvalid); ?>

								<?php echo $account->geterror(Constants::$emailTaken); ?>
								<p><label for=email>Email</label>
					               <input id="email" type="Email" name="email" placeholder="e.g.AkashDixit@gmail.com" value="<?php getInputvalue('email') ; ?>" required></p>

					           

								<p><label for=email1>Confirm Email</label>
					               <input id="email1" type="Email" name="email1" placeholder="e.g.AkashDixit@gmail.com" value="<?php getInputvalue('email1') ; ?>" required></p>

								
								<?php echo $account->geterror(Constants::$passwordDoNoMatch); ?>
								<?php echo $account->geterror(Constants::$passwordNotAlphanumeric); ?>
								<?php echo $account->geterror(Constants::$passwordCharacters); ?>

					            <p>  <label for=password>Password</label>
					        		 <input id="password" type="password" name="password" placeholder="your password"  required></p>


					            <p>  <label for=password1>Confirm Password</label>
					        		 <input id="password1" type="password" name="password1" placeholder="confirm your password" required></p>
					        
					        <button type="submit" name="registerButton">SIGN UP</button>
					        <div class ="hasAccountText">
							   	  
							   	  <span id="hideRegister">Already have an Account ?Login here.</span>
							   </div>
							

							 </form>

						</div>
						<div id="loginText">
							<h1>Get great Music,right now!!</h1>
							<h2>Listen to loads of song for free!</h2>
							<ul>
								<li>Dicover music you'll fall in love with </li>
								<li>Create your own playlists</li>
								<li>Follow artists to keep up to date</li>
							</ul>
						</div>
				</div>	       

    </div>


</body>
</html>