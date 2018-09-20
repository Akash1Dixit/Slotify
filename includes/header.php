<?php  include "includes/config.php";  ?>
<?php  include "includes/classes/Artist.php";  ?>
<?php  include "includes/classes/Album.php";  ?>
<?php  include "includes/classes/Song.php";  ?>

<?php      
 // session_destroy();

    if(isset($_SESSION['userLoggedIn'])){
    	$userLoggedIn = $_SESSION['userLoggedIn'];
    }
      else {
      	header("Location:register.php");
      }
?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Welcome to slotify!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/script.js"></script>

  </head>
  <body>
 
  </script>



  	<div id="mainContainer">

  		<div id="topContainer">
  			  
  			   <?php  include "includes/navBarContainer.php" ; ?>

  			   <div id="mainViewContainer">

  			   	  <div id="mainContent">