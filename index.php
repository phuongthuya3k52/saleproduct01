<!DOCTYPE html>
<html>
<body>
<h1>My shop</h1>

<?php
echo "Show all rows from Product Database";

//Refer to database
$db = parse_url(getenv("DATABASE_URL"));

$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));

// the SQL query
$sql = "SELECT * FROM Product";

//////////////
$stmt = $pdo->prepare($sql);
//execute the query on the server and return the result set
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
?>

<!-- display the data -->
<table align="center" border="1px" style="border-collapse: collapse; text-align: center;" cellspacing="3px">
     <tr>
        <th style="font-size: 20px">ProductID</th>
        <th style="font-size: 20px">Name</th>
        <th style="font-size: 20px">Price</th>
    </tr> -->
    <?php 
    foreach ($resultSet as $row) {
    echo"
    <tr>
        <td>" .$row["productid"] ."</td>
        <td>" .$row["name"] ."</td>
        <td>" .$row["price"] ."</td>
    </tr>"
        // echo "<li>" .$row["productid"] .'--' .$row["name"] .'--' .$row["price"] ."<li>"; -->
        }
    ?>
   
</table>
	


</body>
</html>