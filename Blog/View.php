<html>
<head>
<title>View Blog</title>
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
			$SQLString = "select * from $TableName where title = '$ViewThis'";
			$QueryResult =@mysql_query($SQLString, $DBConnect);
			if($QueryResult == 0)
				print"There was an error";
			
			$sqlup = "update blogs set hits=hits+1 where title='$ViewThis'";
			mysql_query($sqlup);
			
			
			
				while(($Row = mysql_fetch_assoc($QueryResult)) !== false) {
					print"<h2>Blog title: ";
					print"<td>{$Row['title']}</td><br></h2>";
					
					print"<h5>Time added: ";
					print"<td>{$Row['date']}</td>";
					print"     Views: ";
					print"<td>{$Row['hits']}</td></h5>";
					
					
					print"<h4>Tag: ";
					print"<td>{$Row['tag']}</td></h4>";
					
					print"<h4>Content: ";
					print"<td>{$Row['contents']}</td><br></h4>";
					
					
					
				}
			}
		mysql_free_result($QueryResult);
		}
	mysql_close($DBConnect);
	
	
	
?>
</body>
</html>