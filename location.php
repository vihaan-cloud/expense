<?php
// Database connection
include_once "../init.php";
//include_once 'skeleton.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the location name from the form
    $location_name = $_POST['location_name'];

    // Insert the location name into the database
    $sql = "INSERT INTO locations (name) VALUES ('$location_name')";

    if ($conn->query($sql) === TRUE) {
        $message = "New location added successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Location</title>
</head>
<body>
    <h1>Add a New Location</h1>
    <?php
    if (!empty($message)) {
        echo "<p>$message</p>";
    }
    ?>
    <form action="" method="post">
        <label for="location">Location Name:</label>
        <input type="text" id="location" name="location_name" required>
        <input type="submit" value="Save">
    </form>
</body>
</html>



<ul>
  <!-- Other menu items -->
  <li><a href="init.php?page=location">Location</a></li>
</ul>