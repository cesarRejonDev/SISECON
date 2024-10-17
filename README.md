<p align="center">
  &emsp;
  <img alt="Laravel" src="https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white"/>
  &emsp;
  <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Consecurity

Desarrollo de software de seguimiento con DashBoard para consignas de guardias en la empresa INTEC&FOR.

`Build in Laravel 10`

### Instrucciones

- Clona el repositorio con `git clone`
- Copia el archivo .env.example y renombralo como .env para configurar tu base de datos.
- Ejecuta `composer install`.
- Ejecuta `php artisan key:generate` para tener una llave única de la aplicación.
- Ejecuta `php artisan migrate:fresh --seed` para tener las migraciones actualizadas con los seeders correspondientes.
- Es importante ejecutar `php artisan storage:link` para poder acceder a los archivos
- Levanta el proyecto con `php artisan serve`.
- Listo 😎
