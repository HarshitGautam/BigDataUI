<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
	<link href="assets/css/mystyle.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body style="background-image:url(assets/img/bg.jpg); background-size: 100% auto;">
     <div class="wrapper">
    <form class="form-signin" action="userLogin.php" method="post">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" name='name' type="text" class="form-control" placeholder="Username"  value = "" required="" autofocus="" />
	  <p><br></p>
      <input type="password" name='pass'class="form-control" name="password" placeholder="Password" required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit" value="Search" name= "submit">Login</button>   
    </form>
  </div>
	<br>
	 
 <?php 
 if(isset($_POST) && array_key_exists('submit',$_POST))
 {
 $name = isset($_POST['name']) ? $_POST['name'] : '';
 $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
 $servername ='localhost';
 $username = 'root';
 $password = '';
 $dbname = 'bigdata';
  


$conn = new mysqli($servername, $username, $password, $dbname);
$query= "";
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
#no filter is selected
 if ($name != NULL && $pass != NULL)
 { 
	$query = "select * from user where username = '$name' and password = '$pass'";
 
 }
if($query!=NULL)
{
	//echo "loop entered";
if (!$conn->query($query)) 
{
    printf("Errormessage: %s\n", $conn->error);
}
	$result = $conn->query($query);
}
   
		 if($query!=NULL)
		 {
			
			  if( mysqli_num_rows($result) == 0)
			 {
				 echo "<script language=\"Javascript\"> alert(\"Re enter sign in details\")</script>";
			 }
			 else{
			 echo '<script type="text/javascript">window.location = "/BigDataUI/queRec.php"</script>';
			 }
 }

 }       ?>
	
	
    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
