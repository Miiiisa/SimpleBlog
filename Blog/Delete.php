<html>
<head>
<title>Blog deleted</title>
<meta http-equiv="content-type" content ="text/html; charset=iso-8859-1" />
</head>

<body>
<?php include 'include.htm';?>
<h2>Blog has been deleted</h2>
<?php
	include("conn.php");
	if($DBConnect === false)
		print"unable to connect to the database, error Number:".mysql_errno();
	else {
		$DBName ="blogs";
		if(!@mysql_select_db($DBName,$DBConnect))
			print"There is not a DB called $DBName";
		else {
			$TableName = "blogs";
			
			$DeleteThis = stripslashes($_POST['target']);
			$SQLString = "delete from $TableName where ID = '$DeleteThis'";
			$QueryResult =@mysql_query($SQLString, $DBConnect);
			if($QueryResult == 0)
				print"There was an error";
			
	
			}
		}
	mysql_close($DBConnect);

	
	
?>
</body>
</html>