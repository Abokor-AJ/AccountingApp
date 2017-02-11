<?php
  include 'include/init.php';

  //first we check if the user is already loggedin
if (isset($_SESSION['userid']) && $_SESSION['userid']!='') {
	header('Location: welcome.php');   	//if they are loggedin redirect them to another page.
	exit();
	//echo "you are already loggedin";
}

//if submit is not blanked i.e. it is clicked.
if (isset($_POST['Submit'])) //here give the name of your button on which you would like    //to perform action.
{
	$error = array();   // create the array error here

// here check the both submitted text boxes for null value by giving there name.
	if(empty($_POST['userid']) || empty($_POST['password']))
	{
		$error[] = "Please type in your UserID and Password!";
	}else {
		$username = mysql_real_escape_string(stripcslashes(trim($_POST['userid'])));
		$password = mysql_real_escape_string(stripcslashes(trim($_POST['password'])));
	}

	if (empty($error)) {
		//session_start();
	  $sql = "select * from users where username = '$username' &&  password = '$password'";
	  $result = mysql_query($sql)
	    or exit("Sql Error!".mysql_error());
		$rows = mysql_fetch_array($result);
	  $num_rows = mysql_num_rows($result);
	  if($num_rows > 0)
	   {
//here you can redirect on your file which you want to show after login just change filename, give it to your filename.
			while ($rows) {
				$_SESSION['userid'] = $rows['username'];
				header("Location: welcome.php");
				exit();
			}

			 //OR just simply print a message.
				//echo "You have logged in successfully";
			}else {
				$error_message = '<span class="error" style="color:#D00000">UserID or Password is incorrect! Please try again.</span><br /><br />';
			}
	}else {

		$error_message = '<span class="error" style="color:#D00000">';
		foreach ($error as $key => $value) {
			$error_message.="$value";
		}
		$error_message.='</span><br/><br/>';
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Accounting WebApp</title>
  <link rel="stylesheet" href="style/main.css">
  <link rel="stylesheet" href="style/bootstrap.min.css">

</head>
<body>
  <!-- The rest of the content -->
  <div class = "container">
    <div class="wrapper">
      <div> <center><img src="images/logo.png" alt="AKIHA_TECH Logo" /></center> </div><br />
      <div class="row" style="margin-top:20px">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      		<form action="" method="post" name="Login_Form" role="form">
          <fieldset>
      		  <h3 class="form-signin-heading">Please Sign In</h3>
            <center><?php echo $error_message;?></center>
      			<hr class="colorgraph"><br>

      			<input type="text" class="form-control input-lg" name="userid" placeholder="UserID" required="" autofocus="" />
      			<input type="password" class="form-control input-lg" name="password" placeholder="Password" required=""/>

      			<button class="btn btn-lg btn-success btn-block"  name="Submit" value="Login" type="Submit">Login</button>
          </fieldset>
      		</form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
