<p align="center">

<img src="https://lh6.googleusercontent.com/61uG_1f_EeoxqwapEN2lwFYfOF9QqhyYtSZR5b545tyfuuGDBsWDi4vX8SFXaAD0S8o=w2400" width="400" alt="KIOSK">

</p>

# Sistema KIOSK CLE

Este sistema ha sido creado para llevar el control de estudiantes del Centro de Lenguas Extranjeras KIOSK

## Configuracion del proyecto

### Requisitos

- PHP
- Composer
- Servidor Apache, Nginx, ISS
- Editor VSCode, PHP Storm u otro

### Instalacion

1. Clonar el proyecto desde este repositorio en la carpeta ``/var/www/`` o en ``htdocs`` si se usa Windows
2. Dirigirse a la rama ``main``
3. Copiar el archivo ``.env.example`` y nombrarlo ``.env``
4. Servidor de base de datos MariaDB, MySQL, PostgreSQL
4. Configurar en el archivo .env la cadena de conexion a la BD
5. Escribir el siguiente comando
``` 

composer install 

```
7. Posteriormente, escribir el siguiente comando
```

php artisan key:generate

```
8. El proyecto utiliza Vite para empaquetar los archivos estaticos, para ello se deben escribir los siguientes comandos
```

npm install && npm run dev

```
9. O el siguiente comando para generar un build
```

npm run build

```
10. Una vez realizados los pasos anteriores, escribir el siguiente comando para ejecutar el proyecto
```

php artisan serve

```
11. Ir a ``http://127.0.0.1:8000``
12. O bien, con el siguiente comando se asigna la IP del equipo local
```

php artisan serve --host=0.0.0.0 --port=8000

```

### Equipo de desarrollo

| Integrante | Rol                        | Contacto               |
|------------|----------------------------|------------------------|
| Erendira   | Desarrollador              |                        |
| Victor     | Desarrollador/Lider equipo |                        |
| Moises     | Desarrollador              |                        |
| Abraham    | Desarrollador              | jsolisrmzdev@gmail.com |
| Viviana    | Encargada proyecto         |                        |

<br/>

<p align="center">
<strong>Made with</strong>
</p>
<p align="center">
<a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a>
</p>
<p align="center">
