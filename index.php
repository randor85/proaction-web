<?php
declare(strict_types=1);

/**
 * Página pública de ProAction.
 * - Producción (hosting con PHP): se sirve directamente; el formulario envía por contacto.php.
 * - Maqueta HTML de respaldo: `php build_mockup.php` genera mockup/index.html desde este mismo archivo.
 */

$c = require __DIR__ . '/contenido.php';
$modoMaqueta = defined('MODO_MAQUETA');
$rutaBase = $modoMaqueta ? '../' : '';

if (!$modoMaqueta) {
    session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax', 'secure' => !empty($_SERVER['HTTPS'])]);
    session_start();
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(16));
    }
    $_SESSION['form_t'] = time();
}

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function icono(string $nombre): string
{
    static $trazos = [
        'impuestos'  => '<path d="M6 3h9l4 4v14H6z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h4"/>',
        'contable'   => '<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 7h8M8 12h2M12 12h2M16 12h0M8 16h2M12 16h2M16 16h0"/>',
        'personas'   => '<circle cx="9" cy="8" r="3"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/><path d="M16 5.5a3 3 0 010 5M21 20c0-2.5-1.5-4.6-3.7-5.5"/>',
        'empresa'    => '<path d="M4 21V8l8-5 8 5v13"/><path d="M9 21v-6h6v6M9 11h0M15 11h0"/>',
        'asesoria'   => '<path d="M4 19V5M4 19h16"/><path d="M8 15l4-4 3 3 5-6"/>',
        'documentos' => '<path d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>',
        'correo'     => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>',
        'telefono'   => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 005 5L15 13l5 2v4a2 2 0 01-2 2A15 15 0 013 6a2 2 0 012-2z"/>',
        'lugar'      => '<path d="M12 21s7-6.2 7-11a7 7 0 10-14 0c0 4.8 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/>',
        'reloj'      => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'check'      => '<path d="M5 12.5l4.5 4.5L19 7.5"/>',
    ];
    return '<svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . ($trazos[$nombre] ?? '') . '</svg>';
}

$estado = $_GET['enviado'] ?? '';
$ct = $c['contacto'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($c['nombre']) ?> · <?= e($c['eslogan']) ?></title>
    <meta name="description" content="<?= e($c['descripcion_meta']) ?>">
    <meta name="theme-color" content="#0f172a">
    <link rel="stylesheet" href="<?= $rutaBase ?>assets/css/style.css">
    <script src="<?= $rutaBase ?>assets/js/main.js" defer></script>
</head>
<body>
<?php if ($modoMaqueta): ?>
<div class="aviso-maqueta">Maqueta HTML de respaldo · el formulario de contacto solo funciona en la versión PHP</div>
<?php endif; ?>

<header class="barra" id="barra">
    <a class="marca" href="#inicio"><span class="marca-logo">P</span><?= e($c['nombre']) ?></a>
    <button class="menu-boton" id="menuBoton" aria-label="Abrir menú" aria-expanded="false"><span></span><span></span><span></span></button>
    <nav class="menu" id="menu">
        <a href="#servicios">Servicios</a>
        <a href="#cifras">Cifras</a>
        <a href="#nosotros">Nosotros</a>
        <a href="#contacto" class="boton boton-chico">Contacto</a>
    </nav>
</header>

<main>
    <section class="hero" id="inicio">
        <div class="fondo-animado" aria-hidden="true"><i></i><i></i><i></i></div>
        <div class="contenedor hero-grid">
            <div class="hero-texto">
                <p class="etiqueta"><?= e($c['eslogan']) ?></p>
                <h1><?= e($c['titulo']) ?></h1>
                <p class="bajada"><?= e($c['bajada']) ?></p>
                <div class="acciones">
                    <a class="boton" href="#contacto">Solicitar una reunión</a>
                    <a class="boton boton-claro" href="#servicios">Ver servicios</a>
                </div>
            </div>
            <div class="tarjeta-grafico" aria-label="<?= e($c['grafico']['titulo']) ?>">
                <div class="tg-cabecera">
                    <span><?= e($c['grafico']['titulo']) ?></span>
                    <span class="tg-badge">En plazo</span>
                </div>
                <div class="barras">
                    <?php foreach ($c['grafico']['barras'] as $i => [$mes, $v]): ?>
                        <div class="barra-col" style="--hn: <?= round(max(0, min(100, (int)$v)) / 100, 2) ?>; --d: <?= $i * 90 ?>ms">
                            <div class="barra-valor"></div>
                            <span><?= e((string)$mes) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <svg class="linea" viewBox="0 0 300 80" preserveAspectRatio="none" aria-hidden="true">
                    <path d="M0 62 C40 58 60 50 100 44 S170 30 210 22 S270 10 300 6" pathLength="1"/>
                </svg>
            </div>
        </div>
    </section>

    <section class="seccion" id="servicios">
        <div class="contenedor">
            <header class="seccion-cabecera revelar">
                <p class="etiqueta">Servicios</p>
                <h2>Todo lo que su empresa necesita, en un solo lugar</h2>
            </header>
            <div class="grilla servicios">
                <?php foreach ($c['servicios'] as $i => $s): ?>
                    <article class="tarjeta revelar" style="--d: <?= ($i % 3) * 90 ?>ms">
                        <div class="tarjeta-icono"><?= icono($s['icono']) ?></div>
                        <h3><?= e($s['titulo']) ?></h3>
                        <p><?= e($s['texto']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cifras" id="cifras">
        <div class="contenedor grilla cifras-grilla">
            <?php foreach ($c['cifras'] as $i => $f): ?>
                <div class="cifra revelar" style="--d: <?= $i * 90 ?>ms">
                    <strong><?= e($f['prefijo']) ?><span data-contar="<?= (int)$f['valor'] ?>"><?= (int)$f['valor'] ?></span><?= e($f['sufijo']) ?></strong>
                    <span><?= e($f['texto']) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="seccion" id="nosotros">
        <div class="contenedor nosotros-grid">
            <div class="revelar">
                <p class="etiqueta">Nosotros</p>
                <h2><?= e($c['nosotros']['titulo']) ?></h2>
                <?php foreach ($c['nosotros']['texto'] as $p): ?><p><?= e($p) ?></p><?php endforeach; ?>
            </div>
            <ul class="valores revelar" style="--d: 120ms">
                <?php foreach ($c['nosotros']['valores'] as $v): ?>
                    <li><span class="valor-check"><?= icono('check') ?></span><?= e($v) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section class="seccion seccion-oscura" id="contacto">
        <div class="contenedor contacto-grid">
            <div class="revelar">
                <p class="etiqueta etiqueta-clara">Contacto</p>
                <h2>Conversemos sobre su empresa</h2>
                <p>Cuéntenos qué necesita y le responderemos a la brevedad.</p>
                <ul class="datos">
                    <li><?= icono('correo') ?><a href="mailto:<?= e($ct['correo']) ?>"><?= e($ct['correo']) ?></a></li>
                    <li><?= icono('telefono') ?><a href="tel:<?= e(preg_replace('/[^+\d]/', '', $ct['telefono'])) ?>"><?= e($ct['telefono']) ?></a></li>
                    <li><?= icono('lugar') ?><?= e($ct['direccion']) ?></li>
                    <li><?= icono('reloj') ?><?= e($ct['horario']) ?></li>
                </ul>
            </div>
            <form class="formulario revelar" style="--d: 120ms" method="post" action="<?= $modoMaqueta ? '#contacto' : 'contacto.php' ?>"<?= $modoMaqueta ? ' onsubmit="return false"' : '' ?>>
                <?php if ($estado === 'ok'): ?><div class="alerta alerta-ok">¡Gracias! Recibimos su mensaje y le responderemos pronto.</div><?php endif; ?>
                <?php if ($estado === 'error'): ?><div class="alerta alerta-error">No pudimos enviar el mensaje. Revise los datos e inténtelo de nuevo.</div><?php endif; ?>
                <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf'] ?? '') ?>">
                <div class="trampa" aria-hidden="true"><label>No complete este campo<input type="text" name="sitio_web" tabindex="-1" autocomplete="off"></label></div>
                <label>Nombre<input type="text" name="nombre" required maxlength="100" autocomplete="name"></label>
                <div class="fila">
                    <label>Correo<input type="email" name="correo" required maxlength="150" autocomplete="email"></label>
                    <label>Teléfono<input type="tel" name="telefono" maxlength="30" autocomplete="tel"></label>
                </div>
                <label>Mensaje<textarea name="mensaje" rows="4" required maxlength="2000"></textarea></label>
                <button class="boton" type="submit">Enviar mensaje</button>
            </form>
        </div>
    </section>
</main>

<footer class="pie">
    <div class="contenedor pie-grid">
        <span>© <?= date('Y') ?> <?= e($c['nombre']) ?> · <?= e($c['eslogan']) ?></span>
        <a href="#inicio">Volver arriba ↑</a>
    </div>
</footer>
</body>
</html>
