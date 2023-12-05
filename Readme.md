# Proyecto de Desarrollo de Aplicaciones Web

## Integrantes 

| Nombre | <!-- --> |
|--------|-|
|Gamboa Nieto, Pablo|<img src="./team/ProfilePicPablo2.jpeg" width="120" height="150">|
|Pan Zaldivar, Cristian David| <img src="./team/cristianPan.jpeg" width="120" height="150"> |
|Quevedo Zaldivar, Luis Jonathan| <img src="./team/Luis.jpeg" width="120" height="150">|
|Vazquéz Rodríguez, Diana Carolina| <img src="./team/DianaVazquez.png" width="120" height="120"> |

## Estructura del proyecto

![artzone-logo](https://i.imgur.com/CrwsAB7.png)

ArtZone monorepo containing ArtZone app and internal libs.

## Apps

# ArtZone

- [app/](app)
  - [Classes/](app\Classes)
  - [Config/](app\Config)
    - [Boot/](app\Config\Boot)
  - [Controllers/](app\Controllers)
  - [Database/](app\Database)
    - [Migrations/](app\Database\Migrations)
    - [Seeds/](app\Database\Seeds)
  - [Errors/](app\Errors)
  - [Filters/](app\Filters)
  - [Helpers/](app\Helpers)
  - [Language/](app\Language)
    - [en/](app\Language\en)
  - [Libraries/](app\Libraries)
  - [Models/](app\Models)
  - [RulesValidation/](app\RulesValidation)
  - [ThirdParty/](app\ThirdParty)
  - [Utils/](app\Utils)
  - [Validators/](app\Validators)
  - [Views/](app\Views)
    - [components/](app\Views\components)
    - [errors/](app\Views\errors)
      - [alerts/](app\Views\errors\alerts)
      - [cli/](app\Views\errors\cli)
      - [html/](app\Views\errors\html)
    - [pages/](app\Views\pages)
      - [art/](app\Views\pages\art)
      - [auth/](app\Views\pages\auth)
      - [catalog/](app\Views\pages\catalog)
      - [shop/](app\Views\pages\shop)
      - [user/](app\Views\pages\user)
    - [templates/](app\Views\templates)
  - [.htaccess](app.htaccess)
  - [Common.php](app\Common.php)
  - [index.html](app\index.html)
- [public/](public)
  - [assets/](public\assets)
    - [fonts/](public\assets\fonts)
    - [images/](public\assets\images)
      - [cart/](public\assets\images\cart)
      - [ejemp/](public\assets\images\ejemp)
      - [gallery/](public\assets\images\gallery)
  - [.htaccess](public.htaccess)
  - [favicon.ico](public\favicon.ico)
  - [index.php](public\index.php)
  - [robots.txt](public\robots.txt)
- [src/](src)
  - [js/](src\js)
  - [sass/](src\sass)
    - [base/](src\sass\base)
    - [components/](src\sass\components)
    - [pages/](src\sass\pages)
    - [plugins/](src\sass\plugins)
- [tests/](tests)
  - [_support/](tests\_support)
    - [Database/](tests\_support\Database)
      - [Migrations/](tests\_support\Database\Migrations)
      - [Seeds/](tests\_support\Database\Seeds)
    - [Libraries/](tests\_support\Libraries)
    - [Models/](tests\_support\Models)
  - [database/](tests\database)
  - [session/](tests\session)
  - [unit/](tests\unit)
  - [README.md](tests\README.md)
- [writable/](writable)
  - [cache/](writable\cache)
  - [debugbar/](writable\debugbar)
  - [logs/](writable\logs)
  - [session/](writable\session)
  - [uploads/](writable\uploads)
  - [.htaccess](writable\.htaccess)
- [.env.example](.env.example)
- [.gitignore](.gitignore)
- [builds](builds)
- [composer.json](composer.json)
- [composer.lock](composer.lock)
- [gulpfile.js](gulpfile.js)
- [LICENSE](LICENSE)
- [package-lock.json](package-lock.json)
- [package.json](package.json)
- [phpunit.xml.dist](phpunit.xml.dist)
- [preload.php](preload.php)
- [Readme.md](Readme.md)
- [spark](spark)
  

## Para comenzar

Este proyecto utiliza Velzon como panel de administración. Velzon está construido con Bootstrap v5.3.0 y Codeigniter 4, con un código amigable para desarrolladores. Puedes cambiar fácilmente los diseños y modos utilizando esta plantilla.


### Prerequisitos

- **Wamp:** Asegúrate de tener [Wamp](https://www.wampserver.com/en/) o un software similar con PHP v8.2 o una versión superior instalada, así como MySQL 8.0.34 o una versión superior. Si ya tienes instalado Wamp o un software similar en tu computadora, puedes omitir este paso.
- **Composer:** Asegúrate de tener [Composer](https://getcomposer.org/) instalado y funcionando en tu computadora. Si ya tienes instalado Composer en tu computadora, puedes omitir este paso.
- **Node:** Asegúrate de tener [Node](https://nodejs.org/es) instalado y funcionando en tu computadora. Si ya tienes instalado Node en tu computadora, puedes omitir este paso.
- Asegúrate de configurar tu archivo `.env` y la base de datos.


### Instalación

| Comando             | Descripción                                                                                                                                                                               |
| ------------------- | :---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `composer install`  | Esto instalará todos los paquetes necesarios en la carpeta `vendor`. Si recibes algún error al ejecutar el comando `composer install`, no te preocupes, continúa con: `composer update`.     |
| `npm install`       | Esto instalará todos los paquetes necesarios en la carpeta `node_modules`.                                                                                                                 |

### Construcción

| Comando           | Descripción                                                                                  |
| ----------------- | :------------------------------------------------------------------------------------------- |
| `npm run build`   | Construye todos los activos del proyecto, como Css, Js y archivos como imágenes listas para producción. |

### Ejecución Local

| Comando              | Descripción                                                                                                                                                                                                              |
| -------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| `npm run dev`        | Construye todos los activos necesarios para el proyecto, como Css, Js de todas las áreas (administración, pública y común) y al mismo tiempo, ejecuta el proyecto localmente. El servidor de desarrollo es accesible en http://localhost:8080. |


### Links
