<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <p>Title</p>
        <input type="text" name="BookTitle"><br /><br />
        <p>Author</p>
        <input type="text" name="author"><br /><br />
        <p>Quantity</p>
        <input type="number" name="qty"><br /><br />
        <input type="submit" name="submit"><br/><br/><br/>
    </form>
</body>

</html>


<?php
$servername = "mysqlDB";
$username = "root";
$password = "123login";
$dbname = "testapp";

$BookTitle = $_POST['BookTitle'];
$author = $_POST['author'];
$qty = $_POST['qty'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    $sql = "INSERT INTO books (title, author, qty)
VALUES ('$BookTitle', '$author', $qty)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'  ><tr><th>Title</th><th>Author</th><th>Quantity</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["title"]."</td><td>".$row["author"]."</td><td>".$row["qty"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>