<?php
// Archivo: procesar_carrito.php
// Procesa productos enviados por formulario o JSON

header('Content-Type: text/html; charset=UTF-8');

// Detectar si la solicitud es JSON
$contentType = $_SERVER['CONTENT_TYPE'] ?? '';
$isJson = stripos($contentType, 'application/json') !== false;

$productos = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($isJson) {
        // Procesar JSON
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        $productos = $data['producto'] ?? [];
    } else {
        // Procesar formulario HTML
        $productos = $_POST['producto'] ?? [];
    }

    // Mostrar resumen del pedido
    echo "<h2>Resumen del Pedido:</h2><ul>";
    foreach ($productos as $p) {
        $nombre = htmlspecialchars($p['nombre']);
        $cantidad = (int)$p['cantidad'];
        $precio = (float)$p['precio'];
        $total = $cantidad * $precio;

        echo "<li>$nombre - Cantidad: $cantidad - Total: \$$total</li>";
    }
    echo "</ul>";
} else {
    echo "Método no permitido. Usa POST.";
}
?>
