<html>
<head>
<title>Write a new Blog</title>
<meta http-equiv="content-type"content ="text/html; charset=iso-8859-1"/>
</head>

<body>
<?php include 'include.htm';?>
<br></br>

<fieldset>
<form method="POST"action = "BlogInput.php">
Title   :<br>
    <input type="text" name="Title"><br><br>
Contents:<br>
    <textarea rows="5" cols="50" name="Contents"></textarea><br><br>
Tag   :<br>
    <input type="text" name="Tag"><br><br>
	
<p><input type="submit"value="Submit"/></p>
</form></fieldset>

</body>
</html>