<?php 

   class Account {
       private $conn;
   	   private $errorArray;

       public function __construct($conn){
          $this->conn = $conn;
       	  $this->errorArray= array();

       } 
         public function login($un, $ps) {

			$pw = md5($ps);

			$query = mysqli_query($this->conn, "SELECT * FROM users WHERE username='$un' AND password='$pw'");

			if(mysqli_num_rows($query) == 1) {
				return true;
			}
			else {
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}

		}

         public function register($un,$fn,$ln,$em,$em1,$ps,$ps1){

         	 $this-> ValidateUsername($un);
             $this-> ValidateFirstname($fn);
             $this-> ValidateLastname($ln);
             $this-> ValidateEmails($em,$em1);
             $this-> ValidatePasswords($ps,$ps1);

             if(empty($this->errorArray)==true){
             	//insert into db
             	return $this->InsertUserDetails($un,$fn,$ln,$em,$ps);
             }
             else {
             	return false;
             }
         }

         public function getError($error){
         	if(!in_array($error, $this->errorArray)){
         		$error="";
         	}
         	 return "<span class = 'errorMessage' >$error </span>";
         }

         private function InsertUserDetails($un,$fn,$ln,$em,$ps){
             $encryptedps=md5($ps);
             $profiepic= "assets/images/profile-pics/ak.jpg";
             $date= date("Y-m-d");

            //echo "INSERT INTO users VALUES('',$un' , '$fn', '$ln' , '$em', '$encryptedps', '$date' , '$profiepic')  ";

            $result = mysqli_query($this->conn, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedps', '$date', '$profilePic')");
             return $result;
         }
           
          
       private  function ValidateUsername($un){
           
           if(strlen($un)>25 || strlen($un)< 5){
             array_push($this->errorArray, Constants::$usernameCharacters);
             return;
           }
           //TODO:check if username exits
           $checkUsernameQuery= mysqli_query($this->conn,"SELECT username FROM users WHERE username='$un' ");
            if(mysqli_num_rows($checkUsernameQuery)!=0){
            	array_push($this->errorArray, Constants::$usernameTaken);
            	return;
            }
       }   

       
        private function ValidateFirstname($fn){

              if(strlen($fn)>25 || strlen($fn)< 2){
             array_push($this->errorArray, Constants::$firstNameCharacters);
             return;
           }
       }

        private function ValidateLastname($ln){

        	if(strlen($ln)>25 || strlen($ln)< 2){
             array_push($this->errorArray, Constants::$lastNameCharacters);
             return;
           }
        
       }

        private function ValidateEmails($em,$em1){
           
           if($em != $em1){

             array_push($this->errorArray, Constants::$emailDoNoMatch);
             return;
           }
           if(!filter_var($em,FILTER_VALIDATE_EMAIL)){


             array_push($this->errorArray, Constants::$emailInvalid);
             return;
           }
           //TODO: check username hasn't already been used 
            $checkEmailQuery= mysqli_query($this->conn,"SELECT email FROM users WHERE email='$em' ");
            if(mysqli_num_rows($checkEmailQuery)!=0){
            	array_push($this->errorArray, Constants::$emailTaken);
            	return;
            }
       }

        private function ValidatePasswords($ps,$ps1){
            
            if($ps!=$ps1){
            	 array_push($this->errorArray, Constants::$passwordDoNoMatch);
             return;
            }
            if(preg_match('/[^A-Za-z0-9]/', $ps)){
               array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
             return;	
            }
            if(strlen($ps)>30 || strlen($ps)< 5){
             array_push($this->errorArray,  Constants::$passwordCharacters);
             return;
           }
        

       } 	
   }



?>
