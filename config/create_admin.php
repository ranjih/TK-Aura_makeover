
<?php
require_once 'config.php';

$name = 'Admin';
$email = 'admin@gmail.com';

// Change this to your own strong password
$password = 'Makeup@12345';

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare(
    "INSERT INTO admins (name, email, password_hash)
     VALUES (?, ?, ?)"
);

$stmt->execute([$name, $email, $hash]);

echo "Admin account created successfully!";
