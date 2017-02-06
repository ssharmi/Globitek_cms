<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 



<?php
  require_once('../private/initialize.php');

  // Set default values for all variables the page needs.

  // if this is a POST request, process the form
  // Hint: private/functions.php can help

    // Confirm that POST values are present before accessing them.

    // Perform Validations
    // Hint: Write these in private/validation_functions.php

    // if there were no errors, submit data to database

      // Write SQL INSERT statement
      // $sql = "";

      // For INSERT statments, $result is just true/false
      // $result = db_query($db, $sql);
      // if($result) {
      //   db_close($db);

      //   TODO redirect user to success page

      // } else {
      //   // The SQL INSERT statement failed.
      //   // Just show the error, not the form
      //   echo db_error($db);
      //   db_close($db);
      //   exit;
      // }

?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php

    // TODO: display any form errors here
    // Hint: private/functions.php can help
$FirstnameErr = $LastnameErr = $EmailErr = $UsernameErr = "";
$Firstname = $Lastname =$Email = $Username = "";

if ($_SERVER ["REQUEST_METHOD"] == "POST"){
   if (empty ($_POST ["FIRST name"])) {
   $FirstnameErr =" First Name is Required";
} else{
  $Firstname = test_input($_POST [" First name"]);
  }
  
  if (!preg_match (" /^[a-zA-Z ]*$/", $Firstname)){
      $FirstnameErr = " only Letters white space";
   }
}

   if (empty ($_POST ["Last name"])) {
   $LastnameErr =" Last Name is Required";
   } else{
  $Lasttname = test_input($_POST [" Last name"]);
 
  
  if (!preg_match (" /^[a-zA-Z ]*$/", $Lastname)){
      $LastnameErr = " only Letters white space";
   }
}

if (empty ($_POST ["Email"])){
   $EmailErr = " Email Required";
 } else{
    $Email = test_input($_POST ["Email"]);
      // check if the email address is valid
    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
	$EmailErr = " INVALID EMAIL";
	
	
      }
  }
    
  if ( empty($_POST ["UserName"])){

    $UsernameErr = " Username is required";
    
   } else {

      $Username = test_input($_POST["Username"]);
    }
 

   function test_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
     }


   ?>


  <!-- TODO: HTML form goes here -->

 <div>
 <form>
    
<form method="post" action="<?php echo 
htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Firstname: <input type="text" Firstname="First name" value = "<?php echo $Firstname;?>">
  <span class="error">* <?php echo $FirstnameErr;?></span>
  <br><br>
  
  Lastname: <input type="text" Lastname="Last name" value = "<?php echo $Lastname;?>">
  <span class="error">* <?php echo $FirstnameErr;?></span>
  <br><br>
  
    
   Email: <input type="text" Lastname="Email" value = "<?php echo $Email;?>">
  <span class="error">* <?php echo $Email;?></span>
  <br><br>
  
   Username: <input type="text" Username="User name" value = "<?php echo $Username;?>">
  <span class="error">* <?php echo $Username;?></span>
  <br><br>

   <input type = "Submit" name = "Submit" value = "Submit">
   </form>

  <?php 
  echo "<h2>Registration Success </h2>";
   echo "<h3>your Registration was submitted successfully </h3>";

   echo $Firstname;
    echo "<br>";
  
    echo $Lastname;
     echo "<br>";

    echo $Email;
    echo "<br>";

    echo $Username;
     echo "<br>";

   ?>

</body>
</html>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
