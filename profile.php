<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

require_once 'classes/User.php';

$userID = $_SESSION['user_id'];
$user = new User();

try {
    $userData = $user->getUserById($userID);

    if (!$userData) {
        die("User not found.");
    }
} catch (Exception $e) {
    die($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css"/>
</head>
<body>

<?php include './components/header.php'; ?>

<div class="container mt-5">
    <h1>Welcome, <?php echo htmlspecialchars($userData['username'] ?? ''); ?>!</h1>
    
    <?php if (!empty($_GET['update']) && $_GET['update'] == 'success'): ?>
        <div class="alert alert-success" role="alert">
            Profile updated successfully!
        </div>
    <?php endif; ?>

    <form action="db/process_update_data.php" method="POST">
        <div class="mb-3">
            <label for="registerUsername" class="form-label">Change Username</label>
            <input type="text" class="form-control" id="registerUsername" name="registerUsername" value="<?php echo htmlspecialchars($userData['username'] ?? ''); ?>" required>
        </div>
        <div class="mb-3">
            <label for="registerEmail" class="form-label">Change Email</label>
            <input type="email" class="form-control" id="registerEmail" name="registerEmail" value="<?php echo htmlspecialchars($userData['email'] ?? ''); ?>" required>
        </div>
        <div class="mb-3">
            <label for="registerPassword" class="form-label">Change Password</label>
            <input type="password" class="form-control" id="registerPassword" name="registerPassword" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>

    <!-- Log Out Button -->
    <form action="db/process_logout.php" method="post">
        <button type="submit" class="mt-3 btn btn-danger">Log Out</button>
    </form>

    <!-- Delete Account Button -->
    <form action="db/process_delete.php" method="post" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
        <input type="hidden" name="deleteAccount" value="true">
        <button type="submit" class="mt-3 btn btn-danger">Delete Account</button>
    </form>
</div>

<?php include './components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
