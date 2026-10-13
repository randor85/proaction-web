<?php
declare(strict_types=1);

/** Recibe el formulario de contacto y lo envía por correo al destinatario de contenido.php. */

session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax', 'secure' => !empty($_SERVER['HTTPS'])]);
session_start();

function volver(string $estado): never
{
    header('Location: index.php?enviado=' . $estado . '#contacto');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    volver('error');
}

$c = require __DIR__ . '/contenido.php';

// Anti-spam: token CSRF, campo trampa, tiempo mínimo y límite de envíos por sesión.
$csrfOk = isset($_SESSION['csrf'], $_POST['csrf']) && hash_equals($_SESSION['csrf'], (string)$_POST['csrf']);
$trampa = trim((string)($_POST['sitio_web'] ?? '')) !== '';
$muyRapido = time() - (int)($_SESSION['form_t'] ?? 0) < 3;
$ultimo = (int)($_SESSION['ultimo_envio'] ?? 0);
if (!$csrfOk || $muyRapido || time() - $ultimo < 30) {
    volver('error');
}
if ($trampa) {
    volver('ok'); // a los bots se les responde como si hubiera funcionado
}

// Se eliminan saltos de línea de los campos de una línea (evita inyección de cabeceras).
$linea = static fn(string $k, int $max): string => mb_substr(trim(preg_replace('/[\r\n]+/', ' ', (string)($_POST[$k] ?? ''))), 0, $max);
$nombre   = $linea('nombre', 100);
$correo   = $linea('correo', 150);
$telefono = $linea('telefono', 30);
$mensaje  = mb_substr(trim((string)($_POST['mensaje'] ?? '')), 0, 2000);

if ($nombre === '' || $mensaje === '' || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    volver('error');
}

$destino = $c['contacto']['correo'];
$dominio = preg_replace('/^www\./', '', parse_url('http://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'), PHP_URL_HOST) ?: 'localhost');
$cuerpo = "Nuevo mensaje desde el sitio web\n\nNombre: $nombre\nCorreo: $correo\nTeléfono: $telefono\n\n$mensaje\n";
$cabeceras = [
    'From' => 'Sitio web ' . $c['nombre'] . ' <no-responder@' . $dominio . '>',
    'Reply-To' => $correo,
    'Content-Type' => 'text/plain; charset=UTF-8',
    'MIME-Version' => '1.0',
];

$enviado = mail($destino, '=?UTF-8?B?' . base64_encode('Contacto web: ' . $nombre) . '?=', $cuerpo, $cabeceras);
if ($enviado) {
    $_SESSION['ultimo_envio'] = time();
}
volver($enviado ? 'ok' : 'error');
