<?php
declare(strict_types=1);

/**
 * Genera la maqueta HTML estática de respaldo: mockup/index.html.
 * Uso:  php build_mockup.php
 * Se alimenta de index.php y contenido.php, así que siempre queda igual que la versión PHP.
 */

define('MODO_MAQUETA', true);
ob_start();
require __DIR__ . '/index.php';
$html = ob_get_clean();

if (!is_dir(__DIR__ . '/mockup')) {
    mkdir(__DIR__ . '/mockup', 0755, true);
}
file_put_contents(__DIR__ . '/mockup/index.html', $html);
echo "Maqueta generada en mockup/index.html\n";
