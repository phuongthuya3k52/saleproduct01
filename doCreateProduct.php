<!DOCTYPE html>
<html>
<head>
	<title>Processing</title>
</head>
<body>
	<?php 
		$name = $_POST["txtName"];
		$price = $_POST["txtPrice"];	
		echo $name;
		
		//Refere to database 
	   $db = parse_url(getenv("DATABASE_URL"));
	   $pdo = new PDO("pgsql:" . sprintf(
	        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
	        $db["host"],
	        $db["port"],
	        $db["user"],
	        $db["pass"],
	        ltrim($db["path"], "/")
	   ));
	   $data = [
		    'name' => $name,
		    'price' => $price,
		];
		$stmt =  $pdo->prepare("INSERT INTO Product(name,price) VALUES (:name,:price)");	
		$stmt->execute($data);

	 ?>
	 <h2>You have added <?php echo $name?> product sucessfully!</h2>
	<!--  <ul>
	 	<li><?php echo $birthday?></li>
	 	<li><?php echo $gender?></li>
	 	<li><?php echo $fav_book?></li>
	 	<li><?php echo $fav_car?></li>
	 </ul> -->
	 <a href="index.php">Index</a>
</body>
</html>