<!-- configForm.php -->
<?php
session_start();
/*
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
exit();
*/

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generate Image Slider</title>
</head>
<body>
    <h2>Generate Image Slider</h2>
    <form action="push.php" method="POST">
        
        <h3>Please Provide Following Information</h3>
        <label>Title of Work:</label><br>
        <input type="text" name="base_dir" required><br><br>

        <label>URL of the 1st Image:</label><br>
        <input type="text" name="imgURL1" required><br><br>

        <label>URL of the 2nd Image:</label><br>
        <input type="text" name="imgURL2" required><br><br>

        <button type="submit">Save Configuration & Run</button>
    </form>
</body>
</html>