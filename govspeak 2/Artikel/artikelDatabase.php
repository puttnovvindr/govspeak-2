<?php
// Database connection
$servername = "localhost";
$username = "root"; // Adjust according to your settings
$password = ""; // Adjust according to your settings
$dbname = "artikel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$artikel = array();

$sql = "SELECT id, name, content FROM artikel";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $artikel[] = new artikel($row["name"], $row["content"], $row["id"]);
    }
} else {
    echo "0 results";
}
$conn->close();

class artikel {
    public string $name;
    public string $content;
    public int $id;

    public function __construct(string $names, string $content, int $id){
        $this->name = $names;
        $this->content = $content;
        $this->id = $id;
    }
}
?>
