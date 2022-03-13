# Biblio-Code

## Introducción
Este es un proyecto realizado en IES Luis Vélez de Guevara de Écija realizado por tres alumnos de 2ºDAW. Consiste en realizar una página web para la visualización de distintos tutotiales de lenguajes de programación, además dispone la funcionalidad de implementar tus propios tutoriales a la página iniciando sesión con google.
Tambien disponemos de una API REST con la que puedes ver los tutoriales, añadir, modificar o borrar.
Aqui tienes una coleccion de postman para que veas todo lo que puedes hacer con la api.
https://github.com/AlbertoArraz/tweetfony/blob/main/tests/API%20Tweetfony.postman_collection.json

Un correo de prueba para probar el inicio de sesion con google
bibliocode.prueba@gmail.com
bibliocode123

## Tecnología utilizadas
Este Proyecto funciona bajo *Symfony* 6.0, un framework de php además usamos javascript para las tablas y la utilización de ajax, y para el apartado visual usamos boostrap 5 un framework para css

### Que hacer para desplegar la app

Lo primero y muy importante hacer
sudo apt install php-xml php-mysql

1. git clone git@github.com:Biblio-Code/Biblio-Code.git
2. cd Biblio-Code
3. crear el env.local y cambiar las variables de entorno DATABASE_URL, GO_ID y GO_SECRET
4. composer install
5. symfony server:start

### Deplegada en heroku
https://biblio-code.herokuapp.com/

## Requisitos Desarrollo en el Entorno Servidor

- [X] __RA5__: Implementado con Symfony
- [X] __RA7__: API REST que permita hacer CRUD de alguna entidad (usuarios, noticias...)
- [X] __RA8__: Uso de AJAX
- [X] __RA9__: Uso de servivio externo (Google, APIs externas, Twitter...)

## Requisitos Desarrollo en el Entorno Cliente

- [X] __RA5__: Objeto form, objetos relacionados con eventos, eventos, envíos y validación de formularios..etc. No tenéis que tocar todas las partes sino trabajar algún aspecto relacionado con formularios, eventos, validación... Por ejemplo formularios de contacto, formularios de alta y cosas de este tipo 
- [X] __RA6__: Modelo de objetos DOM: objetos, acceso (esto ya lo hemos usado en clase), gestión de eventos (algunos/as ya lo han usado)
- [X] __RA7__: AJAX: envío y recepción de datos de forma asíncrona.

## Requisitos Despliegue de Aplicaciones Web

- [X] __RA4__: Transferencia de archivos. Subir código fuente a __Heroku__
- [X] __RA5__: Parámetros de configuración. Configurar variables necesarias: __URI__ de base datos, ...
- [X] __RA6__: Documentación y control de versiones con __Git__. Desarrollo con __Markdown__ de README.md 

## Requisitos Empresa e Iniciativa Emprendedora

- [X] __RA1__: Iniciativa emprendedora, ideación y  prototipados de la idea. Actitudes personales y profesionales (fase I del proyecto de empresa)
- [X] __RA2__: Análisis del entorno de una actividad. (Fase II Del proyecto de empresa)
- [X] __RA3__: Puesta en marcha de una empresa. Determinación del mercado, elementos de marketing, forma jurídica y obligaciones legales (Fase lV y V del plan de empresa) 
- [X] __RA4__: Gestión administrativa y económica-financiera (fase VI del proyecto de empresa). 

## Requisitos Diseño de Interfaces Web

- [X] __RA1__: Diseño de la web
- [X] __RA2__: Crear un logo para la web
- [X] __RA3__: Crear una licencia Creative Commons para la web y el logo
- [X] __RA4__: Usar imágenes/logos cuyas licencias lo permitan. (Tendréis que facilitarme un archivo que incluya todas las imágenes usadas junto con la URL de origen)

### Participantes
- Alberto Arranz Alé ► [AlbertoArraz](https://github.com/AlbertoArraz)
- Laura Serrano Ruiz ► [lauraaa96](https://github.com/lauraaa96)
- Salvador Delgado Bolancé ► [slvdr510](https://github.com/slvdr510)
