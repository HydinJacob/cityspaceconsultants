
<?php
if(isset($_POST['email'])) {
 
    
    $email_to = "hydinjohnk@gmail.com";
    $email_subject = "Project Enquiries";
	if (mail($to, $subject, $message)){
          $success = "Message sent, thank you for contacting us!";
          $name = $email = $phone = $message ='';
      }
 
   
$nameErr= $emailErr= $phoneErr="";
$name= $email= $phone= $success="";

if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
	 if (empty($_POST["name"]))
		 {  $nameErr = "Name is required";  }
	 else 
		{  $fname=test_input($_POST["name"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$name))
				 {  $nameErr = "Only letters are allowed";  }
		}
	
	if (empty($_POST["email"]))
		 {  $emailErr = "Email is required"; }
	 else 
		{  $email=test_input($_POST["email"]); 
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			 {  $emailErr = "Invalid email format"; }

		}
	
	if (empty($_POST["phone"]))
		 {  $phoneErr = "Contact Number is required"; }
	 else 
		{  $mnumber=test_input($_POST["mnumber"]);
		if (!preg_match("/^[0-9 ]*$/",$mnumber))
			 {  $mnumberErr = "Only numbers are allowed"; }
		 
		 }
		
	if (empty($_POST["message"])) {
		$message = "";}
	 else {
		$message = test_input($_POST["message"]);
  }
	 
  if ($nameErr == '' and $emailErr == '' and $phoneErr== ''){
      $message_body = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
      }
      
      $to = 'hydinjohnk@gmail.com';
      $subject = 'Contact Form Submit';
      if (mail($to, $subject, $message)){
          $success = "Message sent, thank you for contacting us!";
          $name = $email = $phone = $message = $url = '';
      }		
	}

function test_input($data)
  {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

?>
 
   