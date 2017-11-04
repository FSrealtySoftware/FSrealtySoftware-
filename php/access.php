 <!DOCTYPE html>
      <html>
      <head> 
      	<title> FSR Showings </title>
      	<link rel="stylesheet" type="text/css" href="http://www.florostone.com/showings/Style/styles.css">

      	<!-- Latest compiled and minified CSS -->
      	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      	<!-- Optional theme -->
      	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      	<!-- Latest compiled and minified JavaScript -->
      	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

      </head>

<?php
/** 
From index.php - must receive Property GSMLS id & Agent ID 

**/
//session_start();
include 'dbconfig.php';

$p_ID=$_POST ["propertyMLS"];
// Do not let user see this page if not logged in 
//if(!isset($_SESSION['user'])){
	//header("Location: index.php"); 
//// query gets all the property related info given the property MLS id 
$query= "SELECT * FROM properties join propertyAccess on properties.MLS=propertyAccess.MLS WHERE properties.MLS = $p_ID ";

$result = mysqli_query($con, $query);
$row= mysqli_fetch_array($result);

$address= $row['address'];
$city= $row['city'];
$state= $row ['state']; 
$zip= $row ['zipcode']; 
        $type= $row['type'];  // type= GSMLS? OCCUPIED? REGULAR LOCKBOX?
        $code= $row['combo'];
        $notes= $row['notes'];
        $location=$row['location']; 


      function gsmlsType(){ // MEGHANA TO DO 

      	/*enter your code here (HTML & PHP ) to display appropriate information. NOTE- all variables have already been retrieved, just use them at your convenience 

      	*/ 
      	echo "testing- property gsmls type"; 

      }

      function regularLock(){ // JAMAAL TO DO 


      	 	/*enter your code here (HTML & PHP ) to display appropriate information. NOTE- all variables have already been retrieved, just use them at your convenience 
				echo "This property's lockbox combination is " .$code;
							if($location == 'NULL'){
								echo "The location is not specified."
							} else {
								echo "The location of the lockbox combination is at " .$location;
							}
      	*/ 
      	echo "testing- property regular lock  type"; 
      }
      

      function occupied(){

      	echo "<h3> Property is OCCUPIED </h3>"; 
      	echo "<p>Note: $notes </p>";
      } 




      ?>



     
  <body>
  	<img id = "logo" src= "http://www.florostone.com/showings/img/FSR_Logo.png"> 
  	<br> <h2 class="center">Property Access Details  </h2>
  	<div> 



  		<br><br>
  		<center>

  			<div id="rcorners2"> <!-- NICE HTML/CSS DEFINED HERE -->



  			<?php
  			echo "<h4> Address: ".$address." ".$city." ".$state." ".$zip."</h4>";



			if($type=="GSMLS"){ //gsmls lockboxes
				gsmlsType();

			} else if($type=="r") {//regular lockbox 
				regularLock();


			} else if($type=="occ"){ //occupied 
				occupied();

			}



			?> 



		</div>
	</center>



	</div>


</body>
</html>