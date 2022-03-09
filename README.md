# Biblio-Code
Proyecto de Dwes - Dwec - Interfaces - Empresa

## Requisitos Desarrollo en el Entorno Servidor

- [X] __RA5__: Implementado con Symfony
- [ ] __RA7__: API REST que permita hacer CRUD de alguna entidad (usuarios, noticias...)
- [ ] __RA8__: Uso de AJAX
- [ ] __RA9__: Uso de servivio externo (Google, APIs externas, Twitter...)

## Requisitos Desarrollo en el Entorno Cliente

- [ ] __RA5__: Objeto form, objetos relacionados con eventos, eventos, envíos y validación de formularios..etc. No tenéis que tocar todas las partes sino trabajar algún aspecto relacionado con formularios, eventos, validación... Por ejemplo formularios de contacto, formularios de alta y cosas de este tipo 
- [ ] __RA6__: Modelo de objetos DOM: objetos, acceso (esto ya lo hemos usado en clase), gestión de eventos (algunos/as ya lo han usado)
- [ ] __RA7__: AJAX: envío y recepción de datos de forma asíncrona.

## Requisitos Despliegue de Aplicaciones Web

- [ ] __RA4__: Transferencia de archivos. Subir código fuente a __Heroku__
- [X] __RA5__: Parámetros de configuración. Configurar variables necesarias: __URI__ de base datos, ...
- [ ] __RA6__: Documentación y control de versiones con __Git__. Desarrollo con __Markdown__ de README.md 

## Requisitos Empresa e Iniciativa Emprendedora

- [X] __RA1__: Iniciativa emprendedora, ideación y  prototipados de la idea. Actitudes personales y profesionales (fase I del proyecto de empresa)
- [X] __RA2__: Análisis del entorno de una actividad. (Fase II Del proyecto de empresa)
- [X] __RA3__: Puesta en marcha de una empresa. Determinación del mercado, elementos de marketing, forma jurídica y obligaciones legales (Fase lV y V del plan de empresa) 
- [ ] __RA4__: Gestión administrativa y económica-financiera (fase VI del proyecto de empresa). 

## Requisitos Diseño de Interfaces Web

- [ ] __RA1__: Diseño de la web
- [X] __RA2__: Crear un logo para la web
- [X] __RA3__: Crear una licencia Creative Commons para la web y el logo
- [ ] __RA4__: Usar imágenes/logos cuyas licencias lo permitan. (Tendréis que facilitarme un archivo que incluya todas las imágenes usadas junto con la URL de origen)

### Participantes
- Alberto Arranz Alé ► [AlbertoArraz](https://github.com/AlbertoArraz)
- Laura Serrano Ruiz ► [lauraaa96](https://github.com/lauraaa96)
- Salvador Delgado Bolancé ► [slvdr510](https://github.com/slvdr510)

### Que hacer para desplegar la app

Lo primero y muy importante hacer
sudo pecl install mongodb
y
sudo apt install php-mongodb

1. git clone git@github.com:Biblio-Code/Biblio-Code.git
2. cd Biblio-Code
3. crear el env.local y poner cambiar las variables de entorno MONGODB_URL y MONGO_DB
4. composer install
5. symfony server:start
