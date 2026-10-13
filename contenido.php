<?php
/**
 * Contenido editable del sitio. Cambie aquí los textos, cifras y datos de contacto;
 * no hace falta tocar index.php. Los valores marcados con [EDITAR] son de ejemplo.
 */
return [
    'nombre'    => 'ProAction',
    'eslogan'   => 'Gestión tributaria externalizada',
    'titulo'    => 'Su tranquilidad tributaria, en manos expertas',
    'bajada'    => 'Nos hacemos cargo de sus impuestos, contabilidad y remuneraciones para que usted se concentre en hacer crecer su negocio.',
    'descripcion_meta' => 'ProAction: gestión tributaria, contabilidad y remuneraciones externalizadas para empresas y personas.',

    // [EDITAR] Datos de contacto
    'contacto' => [
        'correo'    => 'contacto@proaction.cl',   // también recibe el formulario
        'telefono'  => '+56 2 0000 0000',
        'direccion' => 'Santiago, Chile',
        'horario'   => 'Lunes a viernes, 9:00 a 18:00',
    ],

    // Iconos: nombres de assets/icons en index.php (ver función icono())
    'servicios' => [
        ['icono' => 'impuestos',  'titulo' => 'Gestión tributaria',  'texto' => 'Declaraciones mensuales (F29) y anuales (renta), recuperación de remanentes y apoyo ante el SII.'],
        ['icono' => 'contable',   'titulo' => 'Contabilidad',         'texto' => 'Contabilidad completa y al día, balances y estados financieros claros para tomar decisiones.'],
        ['icono' => 'personas',   'titulo' => 'Remuneraciones',       'texto' => 'Liquidaciones de sueldo, contratos, finiquitos y declaraciones previsionales sin errores.'],
        ['icono' => 'empresa',    'titulo' => 'Constitución y trámites', 'texto' => 'Creación de empresas, modificaciones, inicio de actividades y trámites municipales.'],
        ['icono' => 'asesoria',   'titulo' => 'Asesoría y planificación', 'texto' => 'Planificación tributaria, elección de régimen y análisis para pagar lo justo y a tiempo.'],
        ['icono' => 'documentos', 'titulo' => 'Orden documental',      'texto' => 'Respaldo digital de sus documentos y recordatorios de cada vencimiento.'],
    ],

    // [EDITAR] Cifras animadas: 'valor' es numérico, 'prefijo'/'sufijo' son opcionales
    'cifras' => [
        ['valor' => 12,   'prefijo' => '+', 'sufijo' => '',  'texto' => 'años de experiencia'],
        ['valor' => 150,  'prefijo' => '+', 'sufijo' => '',  'texto' => 'clientes activos'],
        ['valor' => 1800, 'prefijo' => '+', 'sufijo' => '',  'texto' => 'declaraciones al año'],
        ['valor' => 99,   'prefijo' => '',  'sufijo' => '%', 'texto' => 'presentadas dentro de plazo'],
    ],

    // Barras del gráfico animado de la portada (ejemplo ilustrativo)
    'grafico' => [
        'titulo' => 'Cumplimiento tributario',
        'barras' => [['E', 62], ['F', 70], ['M', 78], ['A', 84], ['M', 91], ['J', 100]],
    ],

    'nosotros' => [
        'titulo' => 'Un equipo que se compromete con sus resultados',
        'texto'  => [
            'Somos un estudio especializado en gestión tributaria externalizada. Cada cliente tiene un ejecutivo a cargo que conoce su negocio y responde con rapidez.',
            'Combinamos criterio profesional con tecnología propia: seguimos cada tarea, vencimiento y documento para que nada se pase por alto.',
        ],
        'valores' => ['Cercanía y respuesta rápida', 'Rigor y confidencialidad', 'Tecnología al servicio del cliente'],
    ],
];
