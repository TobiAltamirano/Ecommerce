# Ecommerce and News Portal

# English:

This project is an e-commerce platform and news portal, developed in Laravel with SQL database support.

## 📥 Installation

### 1️⃣ Prerequisites
Before getting started, make sure you have the following installed:
- [Composer](https://getcomposer.org/download/) (PHP dependency manager)
- [XAMPP](https://www.apachefriends.org/index.html) (Apache server and MySQL)
- [Node.js and NPM](https://nodejs.org/)
- SQL database ready for connection

### 2️⃣ Download the project files
Download and extract the project on your local server.

### 3️⃣ Install dependencies
Run the following commands in the project root:
```sh
composer install
```
```sh
npm i
```

### 4️⃣ Database configuration
1. Open **XAMPP** and ensure that both **Apache** and **MySQL** servers are running.
2. Create a database named `portales` in MySQL.
3. Configure the `.env` file with your database credentials.

### 5️⃣ Run migrations and seeders
Run the following commands:
```sh
php artisan migrate
```
If the `portales` database is not created, Laravel will ask for permission to create it. Accept and proceed.

```sh
php artisan db:seed
```
This will populate the database with initial data.

### 6️⃣ Start the server
1. Open **XAMPP** and click **Start** on the Apache server.
2. In your browser (Google Chrome is recommended), go to:
```
http://localhost/laravel-project-final/public/
```

## 🚀 Done! You can now explore the Ecommerce and News Portal. 🎉

<br>

# Español: 

Este proyecto es una plataforma de comercio electrónico y un portal de noticias, desarrollado en Laravel con soporte para bases de datos SQL.

## 📥 Instalación

### 1️⃣ Requisitos previos
Antes de comenzar, asegúrate de tener instalados los siguientes programas:
- [Composer](https://getcomposer.org/download/) (Administrador de dependencias de PHP)
- [XAMPP](https://www.apachefriends.org/es/index.html) (Servidor Apache y MySQL)
- [Node.js y NPM](https://nodejs.org/)
- Base de datos SQL preparada para la vinculación

### 2️⃣ Descargar los archivos del proyecto
Descarga y extrae el proyecto en tu servidor local.

### 3️⃣ Instalar dependencias
Ejecuta los siguientes comandos en la raíz del proyecto:
```sh
composer install
```
```sh
npm i
```

### 4️⃣ Configuración de la base de datos
1. Abre **XAMPP** y asegúrate de que el servidor **Apache** y **MySQL** están activos.
2. Crea una base de datos llamada `portales` en MySQL.
3. Configura el archivo `.env` con las credenciales de tu base de datos.

### 5️⃣ Ejecutar migraciones y seeders
Ejecuta los siguientes comandos:
```sh
php artisan migrate
```
Si la base de datos `portales` no está creada, Laravel pedirá permiso para crearla. Acepta y continúa.

```sh
php artisan db:seed
```
Esto poblará la base de datos con información inicial.

### 6️⃣ Iniciar el servidor
1. Abre **XAMPP** y presiona **Start** en el servidor Apache.
2. En el navegador (se recomienda **Google Chrome**), accede a:
```
http://localhost/laravel-project-final/public/
```

## 🚀 ¡Listo! Ahora puedes explorar el Ecommerce y el Portal de Noticias. 🎉

