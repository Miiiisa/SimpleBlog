<html>
<head>
<title>Blog Input</title>
</head>

<body>
<?php include 'include.htm';?>

<?php
if(empty($_POST['Title']) ||empty($_POST['Contents'])||empty($_POST['Tag']))
	print"You must enter all of the the information";
else {
	include("conn.php");
	if($DBConnect === false)
		print"unable to connect to the database, error Number:".mysql_errno();
	else {
		$DBName ="blogs";
		mysql_select_db($DBName,$DBConnect);
		
		$TableName = "blogs";
		$title = stripslashes($_POST['Title']);
		$contents = stripslashes($_POST['Contents']);
		$tag = stripslashes($_POST['Tag']);
		
		$SQLString = "insert into $TableName(title,contents,tag) values ('$title','$contents','$tag')";
		
		$QueryResult = @mysql_query($SQLString, $DBConnect);
		if($QueryResult === false)
			print"There was an error";
		else 
			print"New blog has been uploaded";
		}
		mysql_close($DBConnect);
}
?>
</body>
</html>