<?php
// Archivo: register.php
// Servicio para registrar usuarios desde formulario HTML o JSON

header('Content-Type: application/json');

// Detectar si la solicitud es JSON o formulario
$contentType = $_SERVER['CONTENT_TYPE'] ?? '';
$isJson = stripos($contentType, 'application/json') !== false;

// Obtener datos de entrada
if ($isJson) {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'] ?? '';
    $password = $data['password'] ?? '';
    $email = $data['email'] ?? '';
    $full_name = $data['full_name'] ?? '';
} else {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    $full_name = $_POST['full_name'] ?? '';
}

if (!$username || !$password) {
    echo json_encode(['message' => 'Faltan datos']);
    exit;
}

// Leer archivo de usuarios
$usersFile = 'users.json';
$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

// Verificar si el usuario ya existe
if (isset($users[$username])) {
    echo json_encode(['message' => 'El usuario ya existe']);
    exit;
}

// Registrar nuevo usuario
$users[$username] = [
    'username' => $username,
    'password' => password_hash($password, PASSWORD_DEFAULT),
    'email' => $email,
    'full_name' => $full_name,
    'role' => 'user'
];

file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));

echo json_encode(['message' => 'Usuario registrado exitosamente']);
?>
