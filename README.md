<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Crud Api| Api token | Tests

El proyecto consiste en un crud para api basado en la adaptación de reddit trabajada en clase.
Las rutas index y shoy de todos los controladores son públicas al igual que el registro de nuevos usuarios, que devolverá un token en texto plano dentro de un json, y "nuevoToken" que, enviando el email y la contraseña de un usuario existente devolverá un nuevo token también.
Por otra parte están las rutas que llevan a los métodos post, update y delete de cada controlador. Dichas rutas están protegidas por el middleware sanctum por lo que para poder acceder a estos métodos se deberá utilizar un Bearer token válido para la autorización.

La batería de test creada es la especificada en el enunciado, algunos test contienen creaciones de registros que si se ejecutan si vaciar la base de datos pueden ocasionar errores.

