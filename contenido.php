<?php
/**
 * Contenido editable del sitio. Cambie aquí los textos, cifras y datos de contacto;
 * no hace falta tocar index.php. Textos tomados del sitio actual proactionconsultores.cl.
 */
return [
    // true = copia de prueba (subdominio): se oculta de Google. Cámbielo a false al publicar en el dominio definitivo.
    'es_prueba' => true,

    'nombre'    => 'Proaction Consultores',
    'eslogan'   => 'Asesoría contable, tributaria y financiera para pymes',
    'titulo'    => 'Planifica el futuro de tu empresa ahora mismo',
    'bajada'    => 'Entendemos que cada empresa es única. Te ayudamos a ordenar tus finanzas, optimizar tus impuestos y conseguir el capital que necesitas para crecer.',
    'descripcion_meta' => 'Proaction Consultores: asesoría contable y tributaria, estrategia financiera y levantamiento de capital para pymes.',

    'contacto' => [
        'correo'    => 'contacto@proactionconsultores.cl',   // también recibe el formulario
        'telefonos' => ['+56 9 9991 1465', '+56 9 9842 0454'],
        'whatsapp'  => '56999911465',                         // solo números, con código de país
        'direccion' => '',                                    // opcional: déjela vacía para ocultarla
        'horario'   => '',                                    // opcional
    ],

    'servicios' => [
        ['icono' => 'impuestos',  'titulo' => 'Consultorías contables y tributarias', 'texto' => 'Asesoría completa en análisis tributario, para que tus obligaciones no sean un problema que afecte tu operación.'],
        ['icono' => 'asesoria',   'titulo' => 'Consultorías en estrategia',            'texto' => 'Planificación estratégica y financiera orientada a tus objetivos: crecimiento, cuota de mercado, pricing y estrategia comercial.'],
        ['icono' => 'contable',   'titulo' => 'Consultorías en gestión',               'texto' => 'Evaluación y levantamiento de procesos, reingeniería, diseño de KPIs, análisis de datos y reportes para decidir mejor.'],
        ['icono' => 'empresa',    'titulo' => 'Formación de empresas',                 'texto' => 'Te acompañamos desde cero: registro, inicio de actividades y verificación en el SII para que puedas facturar con todo en regla.'],
        ['icono' => 'capital',    'titulo' => 'Financiamiento y capital de trabajo',   'texto' => 'Preparamos tu empresa, en lo contable y tributario, para obtener financiamiento en bancos e instituciones financieras.'],
        ['icono' => 'marketing',  'titulo' => 'Marketing digital y redes sociales',    'texto' => 'Marketing digital 360 y planificación de redes sociales para generar leads y aumentar las ventas de tu negocio.'],
    ],

    // 'valor' numérico; 'decimales' opcional. Mismos datos que el contador del sitio actual.
    'cifras' => [
        ['valor' => 30,  'decimales' => 0, 'prefijo' => '',  'sufijo' => '',      'texto' => 'años en el rubro'],
        ['valor' => 500, 'decimales' => 0, 'prefijo' => '+', 'sufijo' => '',      'texto' => 'clientes contentos'],
        ['valor' => 3,   'decimales' => 0, 'prefijo' => '',  'sufijo' => '',      'texto' => 'especialistas en el equipo multidisciplinario'],
        ['valor' => 5.5, 'decimales' => 1, 'prefijo' => 'US$', 'sufijo' => ' M', 'texto' => 'en capital levantado para clientes'],
    ],

    // Barras del gráfico animado de la portada: solo ilustrativo, no son datos reales.
    'grafico' => [
        'titulo' => 'Tu empresa, en crecimiento',
        'insignia' => 'Ilustrativo',
        'barras' => [['E', 40], ['F', 52], ['M', 61], ['A', 74], ['M', 86], ['J', 100]],
    ],

    'pasos' => [
        ['titulo' => 'Diagnóstico gratuito',  'texto' => 'Revisamos tu situación contable, tributaria y financiera, y el objetivo de tu empresa.'],
        ['titulo' => 'Plan a medida',         'texto' => 'Definimos qué necesitas: llevanza, revisión puntual, estrategia o financiamiento.'],
        ['titulo' => 'Ejecución',             'texto' => 'Nos hacemos cargo, con reportes que se entienden y avisos antes de cada vencimiento.'],
        ['titulo' => 'Seguimiento',           'texto' => 'Medimos resultados y ajustamos el plan a medida que tu empresa crece.'],
    ],

    'nosotros' => [
        'titulo' => 'Tu aliado estratégico en cada paso',
        'texto'  => [
            'En Proaction nos dedicamos a ofrecer soluciones personalizadas a las pymes. No solo nos enfocamos en la contabilidad tributaria: te acompañamos en el desarrollo de estrategias financieras que te permiten optimizar tus recursos y crecer de manera sostenible.',
        ],
        'mision'  => 'Ser tu socio estratégico, entregándote herramientas y conocimiento sólido para que cada decisión financiera esté alineada con tus objetivos de largo plazo.',
        'vision'  => 'Ser el referente en asesoría y contabilidad para pymes, reconocidos por la innovación y el foco en el cliente.',
        'valores' => ['Integridad', 'Transparencia', 'Excelencia'],
    ],

    'equipo' => [
        ['nombre' => 'Ignacio Bravo', 'cargo' => 'Cofundador y CFO',  'detalle' => 'Ingeniero Comercial, Analista de Datos, Consultor BPO'],
        ['nombre' => 'Arturo Bravo',  'cargo' => 'Cofundador y CEO',  'detalle' => 'Ingeniero Comercial, Especialista Financiero, Consultor Contable'],
        ['nombre' => 'Myriam Jaime',  'cargo' => 'Análisis jurídico y compliance', 'detalle' => 'Consultoría en inversiones inmobiliarias'],
    ],

    'testimonios' => [
        ['texto' => 'Proaction Consultores nos ayudó a ordenar nuestras finanzas y nuestra contabilidad. Estamos muy agradecidos de trabajar junto a ellos.', 'autor' => 'Miguel Arancibia', 'cargo' => 'CEO, Pixamar'],
        ['texto' => 'Nos dieron una asesoría completa, contable y tributaria, que nos permitió ordenar nuestras finanzas y conseguir capital de trabajo en entidades financieras.', 'autor' => 'Andrés Sotomayor', 'cargo' => 'Cliente'],
        ['texto' => 'Con Proaction formamos nuestra empresa y además realizaron una auditoría contable: teníamos un desorden contable y tributario. Estamos felices.', 'autor' => 'Sandra Belmar', 'cargo' => 'Cliente'],
    ],
];
