<?php
// Archivo: login.php
// Servicio para autenticar usuarios

header('Content-Type: application/json');

// Leer el cuerpo de la petición
$data = json_decode(file_get_contents('php://input'), true);

$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

if (!$username || !$password) {
    echo json_encode(['message' => 'Faltan datos']);
    exit;
}

// Leer usuarios del archivo
$usersFile = 'users.json';
$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

// Verificar credenciales
if (isset($users[$username]) && password_verify($password, $users[$username])) {
    echo json_encode(['message' => 'Autenticación satisfactoria']);
} else {
    echo json_encode(['message' => 'Error en la autenticación']);
}
?>
