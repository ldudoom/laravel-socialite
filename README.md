# Laravel y OAuth 2: Login con RRSS

En el siguiente artículo "**[Explicación del protocolo OAuth 2](https://programacionymas.com/blog/protocolo-oauth-2 "https://programacionymas.com/blog/protocolo-oauth-2")**" se explica OAuth2 de una manera muy detallada y sencilla de entender, todo lo relacionado con OAuth2:

- Qué es
- Roles
- Flujo
- Como funciona
- Preguntas Frecuentes


## Instalacion de Laravel

Procedemos a instalar la última versión de Laravel ejecutando el siguiente comando en nuestra consola

```shell
$ composer create-project laravel/laravel laravel-socialite
```

Una vez instalado, procedemos a crear una BBDD en blanco para nuestra aplicacion.

Luego de eso colocamos las credenciales de nuestra BBDD en el archivo .env del proyecto.

## Instalacion de Breeze

https://laravel.com/docs/10.x/starter-kits

Una vez que tenemos nuestro proyecto listo, vamos a instalar Breeze para tener nuestro modulo de autenticación

```shell
$ composer require laravel/breeze --dev
```

Cuando ya tengamos agregada esta dependencia, procedemos a instalar Breeze utilizando su asistente:

```shell
$ php artisan breeze:install
```

Seguimos los pasos que nos indica el instalador, una vez que terminemos la instalación ejecutamos:

```shell
$ php artisan migrate
$ npm install
$ npm run dev 
```

## Instalando Socialite

https://laravel.com/docs/10.x/socialite

La siguiente dependencia que vamos a agregar a nuestro proyecto es Socialite:

```shell
$ composer require laravel/socialite
```
