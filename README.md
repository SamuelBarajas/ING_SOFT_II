## Laravel

Nombre del proyecto: CUCEIBLOG

### Descripción del objetivo del proyecto

El objetivo de este proyecto es la realización de un blog donde se implementase
la metodología MVC, usando como tecnología principal Laravel y como parte de retroalimentación
y curiosidad decidí usar Vue para el frontend el cual consume los datos de una api, pero esta parte solo lo
presencia el usuario regular, aparte del uso de vue, se complementó otro framework que es bootstrap para facilitar 
y mejorar el diseño del sitio web, es decir que el usuario se sienta cómodo con lo que se muestra en el sitio, 
además de cumplir con los requisitos dados por el profesor.
Por lo que el blog fue adaptado para cumplir con los requisitos, como los son las validaciones,
esquemas para la base de datos, por ejemplo los seeders, migration, factories estos componentes
son propiamente dados en Laravel, la autenticación y autorización, ademas en el proyecto ahi 
dos tipos de usuarios, uno que requiere autenticación y validación del correo, el otro usuario es
el que administra la información es decir que es el único que puede agregar, eliminar y modificar los elementos 
dados en el blog.
Por otro lado, el usuario regular puede observar los posts, ya sea la información, imagen, si este contiene
un archivo para poder descargar y consultar lo que contiene este.

[Requisitos del proyecto](https://github.com/samuelmg/programacion-internet/blob/master/requisitos-proyecto.md)

## Integrantes:
Dominguez Edgar

## Instrucciones de instalación: Comandos a usar una vez clonado el proyecto
* composer install
* npm install
* Debera crear la base de datos: cuceiblog
* Ademas debe crear dentro del proyecto un archivo .env, una forma seria duplicar el archivo .env.example y renombralo .env e ingresar los datos de conexion con la base de datos como se muestra en la siguiente pagina [archivo .env](https://geoinnova.org/blog-territorio/como-clonar-un-proyecto-de-laravel-desde-github/)
* php artisan key:generate
* php artisan migrate
* php artisan storage:link
* Por ultimo debe recopilar los datos de mailtrap, asi que debe iniciar sesion, copia los datos obtenidos de smtp settings, en integrations Laravel 7+ y los datos mostrados debera escribirlo en su opcion correspondiente dentro del archivo .env en la parte de MAIL, ya que los usuarios deben estar previamente verificados para ingresar.
* Por ultimo se encuentra un usuario administrativo el cual cuenta con el correo admin@gmail.com y una contraseña sencilla de 8 caracteres, donde puede ingresar a un modulo solo permitido a este tipo de usuario.

