## Proyecto con Laravel y Vue
Este es un README para ejecutar un proyecto que utiliza Laravel y Vue. A continuación, se detallan los pasos necesarios para configurar y ejecutar el proyecto con las versiones específicas de Laravel y Vue mencionadas:

### Requisitos previos
Asegúrate de tener instalados los siguientes componentes en tu sistema:
- PHP >= 7.4
- Composer
- Node.js >= 14
- NPM >= 6


### Instalación

1. Instala las dependencias de PHP
```shell
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

2. Instala las dependencias de Node
```shell
npm install
```

3. Genera los archivos de Vue
```shell
npm run dev
```

4. Ejecuta el servidor de Laravel
```shell
php artisan serve
```

5. Abre el navegador en la dirección http://localhost:8000
6. ¡Listo!
