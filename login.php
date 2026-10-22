<?php
// login.php
session_start();

require_once 'data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Check if user exists and password is correct
    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        // Regenerate session ID to prevent session fixation attacks
        session_regenerate_id(true);
        
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        
        header('Location: configForm.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Please Login</h2>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <div>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <br>
        <button type="submit">Log In</button>
    </form>
</body>
</html>