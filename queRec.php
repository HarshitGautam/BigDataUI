<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Core CSS - Include with every page -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
	<link href="assets/css/mystyle.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
	<body>
	<div id="wrapper">
        <!-- navbar top -->
		
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
			
            <div class="navbar-header">
			<div class="col-sm-11">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">
					<img src="assets/img/solg.png" alt="" height = "50" width = "40"/>
					<img src="assets/img/logo.jpg" alt="" height = "50" width = "300"/>
                </a>
            </div>
				<div class="col-sm-1">
				<a href="index.php" class="btn btn-lg btn-primary btn-block" role="button">Logout</a>
				</div>
			</div>
			</nav> 	
				
    </div>
     <div class="wrapper">
    <form class="form-signin" action="queRec.php" method="post">       
      <h2 class="form-signin-heading">Your Expertise</h2>
      <input type="text" name='interest' type="text" class="form-control" placeholder="Interest"  value = "" required="" autofocus="" />
	  <p><br></p>    
      <button class="btn btn-lg btn-primary btn-block" type="submit" value="Search" name= "submit">Submit</button>   
    </form>
  </div>
	<br>
	 
 <?php 
 if(isset($_POST) && array_key_exists('submit',$_POST))
 {
 $interest = isset($_POST['interest']) ? $_POST['interest'] : '';
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
 if ($interest != NULL)
 { 
	$query = "select * from questions q JOIN pageranks r on q.id = r.postid where q.tags like '%$interest%' order by r.rank desc limit 10 ";
 
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
				 echo "<script language=\"Javascript\"> alert(\"Re enter your expertise\")</script>";
			 }
			 else{
				echo "<div class = 'container' class = 'center'><div class = 'row'>
				<table class='table table-bordered'>
				<thead class='thead-inverse'>
				<tr>
				<th>#</th>
            <th>Questions</th>
			<th>Action</th>
        </tr>
		</thead>
		<tbody><tr>";
           $i = 0;
		 
           while ($row = $result->fetch_assoc()) 
		   {
               $class = ($i == 0) ? "" : "alt";
			 
               echo "<th scope=\"".$class."\"></th>";
               echo "<td>".$row["body"]."</td>";
			   echo "<td><a href='http://stackoverflow.com/questions/".$row["postid"]."/' target='_blank' class='btn btn-primary' role='button'>Respond</a></td>";
               echo "</tr>";
			   
               $i = ($i==0) ? 1:0;
           }
		    echo "</tbody></table></div></div>";
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
