<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


// // sql to create table
// $sql = "CREATE TABLE MyGuest (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// reg_date TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table MyGuests created successfully";
  
// } else {
//     echo "Error creating table: " . $conn->error;
// }


    $sql = "INSERT INTO MyGuest (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com');";
    $sql = "INSERT INTO MyGuest (firstname, lastname, email)
    VALUES ('Mary', 'Moe', 'mary@example.com');";
    $sql = "INSERT INTO MyGuest (firstname, lastname, email)
    VALUES ('Julie', 'Dooley', 'julie@example.com')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




$sql = "SELECT id, firstname, lastname FROM MyGuest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}


$conn->close();
?>