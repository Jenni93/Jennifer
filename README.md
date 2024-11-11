

## Proyecto de Tasación - Laravel + Laravel Nova - Jennifer Gonzalez

Este proyecto implementa un sistema de tasaciones que incluye un flujo de solicitud de tasación, gestión de estado, trazabilidad, y notificaciones automáticas a los clientes. Este README proporciona una guía detallada para configurar y ejecutar el proyecto en un entorno de desarrollo con Laragon.

## Requisitos Previos

Asegúrate de tener instaladas las siguientes herramientas:

- Laragon: Entorno de desarrollo para aplicaciones PHP con MySQL y Mailpit.
- Composer: Administrador de dependencias de PHP.
- PHP 8.0 o superior: Requerido para Laravel 9 y Laravel Nova.


## Instalación del Proyecto
### 1. Clonar el Repositorio
Clona este repositorio en el directorio raíz de Laragon (por defecto C:\laragon\www):

`git clone https://github.com/Jenni93/Jennifer.git`

### 2. Ejecutar Migraciones y Seeders
Crea las tablas necesarias y, si es necesario, genera datos iniciales con seeders.

`php artisan migrate --seed`

## Ejecución del Proyecto

### 1. Iniciar el Servidor de Desarrollo
Desde Laragon, ve a Menu > www > proyecto-tasacion o abre una terminal y navega al proyecto para iniciar el servidor:

`php artisan serve`

### 2. Usuario Predeterminado
Si es la primera vez que ejecutas la aplicación y la base de datos está vacía, puedes iniciar sesión con las siguientes credenciales predeterminadas:

- **Correo:** admin@admin.com
- **Contraseña:** password123

### 3. Acceder a Laravel Nova
Accede a Laravel Nova para gestionar el panel administrativo:
`http://jennifer.test/nova/nova`

### 4. Visualizar Emails en Mailpit
Para visualizar las notificaciones de correo, abre Mailpit en Laragon:
`http://localhost:8025`

## Comandos Útiles

Asegúrate de tener instaladas las siguientes herramientas:

- Migrar Base de Datos: php artisan migrate
- Limpiar Cache: php artisan cache:clear
- Limpiar Configuración Cache: php artisan config:clear
