<html>
<head>
<title>View Tag</title>
<meta http-equiv="content-type" content ="text/html; charset=iso-8859-1" />
</head>

<body>
<?php include 'include.htm';?>
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
			
			$ViewThis = stripslashes($_POST['target']);
			$SQLString = "select * from $TableName where tag = '$ViewThis'";
			$QueryResult =@mysql_query($SQLString, $DBConnect);
			if($QueryResult == 0)
				print"There was an error";
			
			$sqlup = "update blogs set hits=hits+1 where title='$ViewThis'";
			mysql_query($sqlup);
			
			
			
				print"<table width ='70%' border '1'>";
				print"<tr><th>ID</th><th>title</th><th>tag</th><th>hits</th></tr> ";
				
				
				while(($Row = mysql_fetch_assoc($QueryResult)) !== false) {
					print"<tr><td>{$Row['title']}</td>";
					print"<td>{$Row['tag']}</td>";
					print"<td>{$Row['hits']}</td></tr>";
				}
				print"</table>";
			}
		mysql_free_result($QueryResult);
		}
	mysql_close($DBConnect);
	

	
	
?>

<form method="POST" action = "View.php">
<p>Enter a blog title to view its content: <input type = "text" name = "target"/></p>
<p><input type="submit" value="Submit"/></p>
</body>
</html>