
<?php 

        
       function senitizeFormPassword($inputText){
         
          	$inputText=strip_tags($inputText);
   	        return $inputText;
       }


       function senitizeFormUsername($inputText){
         
          	$inputText=strip_tags($inputText);
   	        $inputText=str_replace(" ", "" , $inputText);
   	        return $inputText;
       }

       function senitizeFromString($inputText){

       	   	$inputText=strip_tags($inputText);
   	        $inputText=str_replace(" " , "", $inputText);
         	$inputText=ucfirst(strtolower($inputText));
         	return $inputText;
       }


   if(isset($_POST['registerButton'])){

   	$username= senitizeFormUsername($_POST['username']);
      
   	$firstname=senitizeFromString($_POST['firstname']);
     
   	$lastname=senitizeFromString($_POST['lastname']);
       
   	$email=senitizeFromString($_POST['email']);
       
   	$email1=senitizeFromString($_POST['email1']);

   	$password=senitizeFormPassword($_POST['password']);

   	$password1=senitizeFormPassword($_POST['password1']);


    $wasSuccessful= $account->register($username,$firstname,$lastname,$email,$email1,$password,$password1);
          
          if($wasSuccessful==true){

            $_SESSION['userLoggedIn']=$loginUsername;
            header("Location:index.php");
          }
   }



?>