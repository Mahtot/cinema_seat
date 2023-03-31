<html>
    <head>
        <title>
            Booking cinema seat
</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="all.css">
</head>
<body>
<header>
		<h1>Cinema Booking Website</h1>
		<a href="www.mekelle.gov.et">MEKELLE CITY</a>        
    </header>

    <ul>
        <li><a href="index.html" >Home</a></li>
        <li><a href="book.html">Book</a></li>
        <li><a href="Aboutus.html" >About us</a></li>
        <li><a href="Share.html">Share</a></li>
    </ul>


    <div class="content">
        
    
<?php

$uname=$_POST['uname'];

$Pnum=$_POST['pno'];
$numseat=$_POST['Seats'];
$pay=$_POST['Pay'];






$con=mysql_connect("localhost","root","");
   if(! $con ) {
    die('Could not connect: ' . mysql_error());
 }
 
 
 
 $sql = 'CREATE Database  IF NOT EXISTS  bbbb';
 $retval = mysql_query( $sql, $con );
 
 if(! $retval ) {
    die('Could not create database : ' . mysql_error());
 }
 
 
 mysql_select_db( 'Cinema' );
 $sqll = 'CREATE TABLE  IF NOT EXISTS booking( '.
       'User_name text NOT NULL, '.
     'Phone_number   VARCHAR(20) NOT NULL, '.
      'Number_seats text NOT NULL, '.
      'Payment VARCHAR(20) NOT NULL)';

   $retvall = mysql_query( $sqll, $con );

   if(! $retvall ) {
    die('Could not create table: ' . mysql_error());
 }

$sqll="SELECT * FROM BOOKING WHERE User_name='$uname' ";
$retvall=mysql_query($sqll,$con);
 if(mysql_num_rows($retvall)>=1 ){
    echo "<h2 style='color:grey;text-align:center'><span >User name already taken.</span></h2><br><br>";
    echo'<a href="book.html"> <button size="200px"> Create a new one</button></a>';
 }
 else{
 $query = "INSERT INTO  booking(User_name, Phone_number,Number_seats,Payment )
	      VALUES ('$uname','$Pnum','$numseat','$pay');";
         $boo = mysql_query($query, $con);	
	    if(! $boo ) {
		  die("Could not connect: " . mysql_error()); 
	    }  	 
echo "<h2 style='color:grey;text-align:center'>You have successfully booked your cinema seat.
</h2>";
$sqll="SELECT * from booking where User_name='$uname'  ";
$retvall=mysql_query($sqll,$con);
if(!$retvall){
   die('Could not fetch the required data: '.mysql_error());

}
while($row = mysql_fetch_array($retvall, MYSQL_ASSOC)) {
   echo "<h4 style='color:grey;text-align:center'> User Name :{$row['User_name']}  <br> ".
      "Phone Number : {$row['Phone_number']} <br> ".
      "Number of seats: {$row['Number_seats']}<br></h4>";
      
}

echo "<h3 style='color:grey;text-align:center'>Thank you for using our service.\n</h3>";
 }
 
mysql_close($con);
?>
</div>
    </body>
    </html>
