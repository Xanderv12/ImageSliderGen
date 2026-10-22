<!-- push.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape all user inputs to ensure security
    $base_dir = escapeshellarg($_POST['base_dir']);
    $imgURL1 = escapeshellarg($_POST['imgURL1']);
    $imgURL2 = escapeshellarg($_POST['imgURL2']);

    // Adjust python path and script path to match your server environment
    $pythonPath = ''; // Place location of python.exe or python3.exe here, e.g., C:\Python39\python.exe or /usr/bin/python3
    $scriptPath = ''; // Place location of GUI_2.py here

    // Build the command line call
    $command = "$pythonPath $scriptPath $base_dir $imgURL1 $imgURL2 2>&1";

    // Execute script
    $output = shell_exec($command);

    echo "<h3>Execution Result:</h3>";
    echo "<pre>" . htmlspecialchars($output) . "</pre>";
    echo '<br><a href="configForm.php">Back to Form</a>';
}
?>