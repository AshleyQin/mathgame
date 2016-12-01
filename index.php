<?php
	session_start();

?>
<html>
	<head>
		<title>Math Game</title>
		<link rel="stylesheet" href="style/bootstrap.css" type="text/css" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<form action="door.php" method="get">
            <input type="hidden" value="logout" name="logout" />
                    <input value="logout" type="submit" />          
        </form>
		<?php
		extract($_GET);
		
		if(isset($_SESSION["login"]) || (isset($id) && isset($pw))) { 
        if(isset($_SESSION["login"]) || ($id == "a@a.a" && $pw =="aaa")) {
		 $_SESSION["login"] = "";
		
		if(!isset($_SESSION["score"])) {
                $_SESSION["score"] = 0;
            }
		if(!isset($_SESSION["question"])) {
                $_SESSION["question"] = -1;
            }
		
        if(isset($_GET["answer"])) {
		if(!is_numeric($_GET["answer"])){
			echo "Please enter a numeric value.";
            $_SESSION["question"]--;
		}elseif($_GET["answer"] == $_SESSION["answer"]){
			echo "The answer is correct.";
			$_SESSION["score"]++;
		}elseif($_GET["answer"] != $_SESSION["answer"]){
			echo "The answer is wrong.";
		}
        }
		
		echo "<br/>";
		
		$a = rand(0,1);
		switch($a){
			case 0 : 
				$first = rand(0,20);
				$second = rand(0,20);
				$_SESSION["answer"] = $first + $second ;
				
				echo $first . '+' . $second . '<br/>';
				$_SESSION["question"]++;
				break;
			case 1 :
				$first = rand(0,20);
				$second = rand(0,20);
				$_SESSION["answer"] = $first - $second ;
				
				echo $first . '-' . $second . '<br/>';
				$_SESSION["question"]++;
				break;
		}
		
		echo "Score:" . $_SESSION["score"] . " / " . $_SESSION["question"];
			
		} else {
            header("location:door.php");
            die();
        }        
    } else {
        header("location:door.php");
        die();
    }
		?>
		
		<form action="index.php" method="get">
			<label>
				<h3>Answer:</h3>
			</label>
			<input type="text" name="answer" />
			<input type="submit"/>
		</form>
		
	</body>
</html>