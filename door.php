<?php
	session_start();

	if (isset($_GET["logout"])) {
        if ($_GET["logout"] == "logout") {
            unset($_SESSION["login"]);
            unset($_SESSION["score"]);
            unset($_SESSION["question"]);            
            unset($_POST["id"]);
            unset($_POST["pw"]);
            unset($_POST["logout"]);
        }
    }
?>
<html>
	<head>
		<title>Math Game Log-in</title>
		<link rel="stylesheet" href="style/bootstrap.css" type="text/css" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<h3> Math Game Log-in</h3>
		<form action="index.php" method="get">
			<label>
				ID
			</label>
			<input placeholder="Enter ID" type="text" name="id" />
			<br/>
			<label>
				PW
			</label>
			<input placeholder="Enter password"type="text" name="pw" />
			<br/>
			<input type="submit"/>
		</form>
	</body>
</html>