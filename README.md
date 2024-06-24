# ToDo Master 🚀

ToDo Master es una aplicación web desarrollada en Laravel para gestionar tus tareas diarias. Con esta aplicación, puedes crear, editar, marcar como completadas y eliminar tareas de manera sencilla.

## Características ✔️

- **Creación de tareas:** Añade nuevas tareas con una interfaz amigable.
- **Listado de tareas:** Visualiza todas tus tareas en un solo lugar.
- **Marcado de tareas:** Marca las tareas como completadas.
- **Eliminación de tareas:** Elimina las tareas que ya no necesites.
- **Paginación:** Navega fácilmente entre tus tareas si tienes muchas.

## Requisitos 📖

- PHP >= 8.0
- Composer
- MySQL
- Node.js y npm

## Instalación 🧰

Sigue estos pasos para configurar y ejecutar la aplicación en tu entorno local.

### Clonar el repositorio💾 

```sh
git clone https://github.com/tu-usuario/todo-master.git
cd todo-master
```

### Instalar dependencias 📂
```sh
composer install
npm install
npm run dev
```

### Configurar variables de entorno 🖥️
Copia el archivo .env.example y renómbralo a .env. Luego, configura tus variables de entorno, especialmente la conexión a la base de datos:
```sh
cp .env.example .env
```

Abre el archivo .env y ajusta las siguientes variables:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

```

### Genera la llave de la aplicación 🔐
```sh
php artisan key:generate
```

### Corre las migraciones 🪚
```sh
php artisan migrate
```

### Sirve la aplicación 🐕‍🦺
```sh
php artisan serve
```
Ahora, puedes acceder a la aplicación en http://localhost:8000.

### Contribuir a la aplicación 🛂
Si deseas contribuir a este proyecto, por favor sigue estos pasos:

1. Haz un fork del repositorio
2. Crea una nueva rama (git checkout -b feature/nueva-funcionalidad).
3. Realiza tus cambios y haz commit (git commit -am 'Añadir nueva funcionalidad').
4. Sube tus cambios (git push origin feature/nueva-funcionalidad).
5. Abre un Pull Request.
