<?php
include("dbConnect.php");


$select_all_sql = "SELECT * FROM STUDENT";
$select_all_res = $conn->query($select_all_sql) or die("1". $conn->error);
if ($select_all_res->num_rows < 1) {
   $display_block .= "<p><em>No data found</em></p>";
}
else{
   while ($cats = $select_all_res->fetch_array()) 
   {
        $username  = $cats['username'];
        $beltLevel = strtoupper(stripslashes($cats['beltLevel']));
        $name = stripslashes($cats['FName'])." ".stripslashes($cats['LName']);

        echo	"Username: ".$username."<br>".
				"Belt Level: ".ucfirst(strtolower($beltLevel))."<br>".
				"Name: ".$name."<br>".
				"----------------------------------------------------------------<br>";

   }
}



$select_all_res->free();
//close connection to MSSQL
$conn->close();
?>