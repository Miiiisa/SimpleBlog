<html>
<head>
<title>Delete Blog</title>
<meta http-equiv="content-type" content="text/html; charset-iso-8859-1" />
</head>

<body>
<?php include 'include.htm';?>
<h2>Choose a blog to delete by ID</h2>
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
			$SQLString = "select * from $TableName";
			$QueryResult = @mysql_query($SQLString, $DBConnect);
			if(mysql_num_rows($QueryResult) == 0)
				print"There are no blogs.  :(";
			else {
				print"<table width ='70%' border '1'>";
				print"<tr><th>ID</th><th>title</th><th>tag</th><th>hits</th></tr> ";
				
				
				while(($Row = mysql_fetch_assoc($QueryResult)) !== false) {
					print"<tr><td>{$Row['id']}</td>";
					print"<td>{$Row['title']}</td>";
					print"<td>{$Row['tag']}</td>";
					print"<td>{$Row['hits']}</td></tr>";
				}
				print"</table>";
				print"<br></br>";
				
			}
		mysql_free_result($QueryResult);
		}
		
	mysql_close($DBConnect);
	}
	
	 
	
?>
<form method="POST" action = "Delete.php">
<p>Blog ID to delete: <input type = "text" name = "target"/></p>
<p><input type="submit" value="Submit"/></p>
</form>
</body>
</html>