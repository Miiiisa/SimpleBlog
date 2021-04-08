<!DOCTYPE html>
<html lang="en">
<?php include 'include.htm';?>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
<title>My Blog</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>



<div class="row">
  <div class="side">
    <h2>About Me</h2>
    <h5>Photo of me:</h5>
    <div><img src="pic1.png"></div>
    <p>Hi, I am spongbob, this is my blog.</p>
    <h3>Search</h3>
    <form method="POST" action = "View.php">
<p>Enter a blog title to view its content: <input type = "text" name = "target"/></p>
<p><input type="submit" value="Submit"/></p>
</form>
 <form method="POST" action = "ViewTag.php">
<p>Enter a tag to search all related blogs: <input type = "text" name = "target"/></p>
<p><input type="submit" value="Submit"/></p>
</form>
	
  </div>



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
				print"<tr><th>Title</th><th>Tag</th><th>Hits</th></tr> ";
				
				
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
	}
?>

 

</div>

<div class="footer">
  <h2>My Blog made by Zhengwei Tan</h2>
</div>



</body>
</html>
