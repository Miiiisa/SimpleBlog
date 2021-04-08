<html>
<head>
<title>All Blogs</title>
<meta http-equiv="content-type" content="text/html; charset-iso-8859-1" />
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
			$SQLString = "select * from $TableName";
			$QueryResult = @mysql_query($SQLString, $DBConnect);
			if(mysql_num_rows($QueryResult) == 0)
				print"There are no blogs.  :(";
			else {
				print"<table width ='100%' border '1'>";
				print"<tr><th>Title</th><th>Contents</th><th>Tag</th><th>Hits</th><th>Date</th></tr>";
				
				while(($Row = mysql_fetch_assoc($QueryResult)) !== false) {
					print"<tr><td>{$Row['title']}</td>";
					print"<td>{$Row['contents']}</td>";
					print"<td>{$Row['tag']}</td>";
					print"<td>{$Row['hits']}</td>";
					print"<td>{$Row['date']}</td></tr>";
				}
				print"</table>";
			}
		mysql_free_result($QueryResult);
		}
	mysql_close($DBConnect);
	}
	
	
?>
</body>
</html>