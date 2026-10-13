# ProAction · Sitio web público

Página corporativa de ProAction (gestión tributaria externalizada). Diseño sobrio con
animaciones suaves: fondo animado, gráfico de portada, contadores de cifras, aparición al
desplazar y efectos al pasar el cursor. Respeta la opción "reducir movimiento" del sistema.

## Cómo está organizado

| Archivo | Para qué sirve |
|---|---|
| `contenido.php` | **Aquí se editan los textos**, servicios, cifras y datos de contacto |
| `index.php` | La página (producción en el hosting con PHP) |
| `contacto.php` | Recibe el formulario y lo envía por correo (anti-spam incluido) |
| `assets/` | Estilos (`css/style.css`) y animaciones (`js/main.js`) |
| `mockup/index.html` | **Maqueta HTML de respaldo**, funciona sin PHP |
| `build_mockup.php` | Regenera la maqueta a partir de `index.php` y `contenido.php` |

## Publicar en el hosting (PHP)

1. Edite `contenido.php`: sobre todo el **correo de contacto** (recibe el formulario), teléfono, dirección y las cifras (los valores actuales son de ejemplo).
2. Suba todo el contenido del repositorio a la carpeta pública del hosting (`public_html/` o la del dominio) por FTP o el administrador de archivos. No hace falta subir `mockup/` ni `README.md`.
3. Pruebe el formulario. El correo se envía con `mail()` de PHP; si no llega, revise la carpeta de spam o pida a su proveedor que habilite el envío desde el dominio.
4. Cuando el hosting tenga HTTPS, descomente el bloque final de `.htaccess` para forzarlo.

> Si su CRM ya está en el mismo dominio, use una carpeta o subdominio distinto para no mezclar los archivos.

## Maqueta HTML de respaldo

`mockup/index.html` es una copia estática de la misma página (el formulario no envía nada).
Sirve para mostrar el diseño o publicar una versión mínima si el hosting falla.
Tras cambiar `contenido.php` o `index.php`, regénerela con:

```
php build_mockup.php
```

## Probar en su computador

```
php -S localhost:8000
```

y abra <http://localhost:8000>.
