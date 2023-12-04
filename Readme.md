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
  - [Config/](app\Config)
  - [Controllers/](app\Controllers)
  - [Database/](app\Database)
  - [Filters/](app\Filters)
  - [Helpers/](app\Helpers)
  - [Language/](app\Language)
  - [Libraries/](app\Libraries)
  - [Models/](app\Models)
  - [ThirdParty/](app\ThirdParty)
  - [Utils/](app\Utils)
  - [Validation/](app\Validation)
  - [Views/](app\Views)
  - [.htaccess](app.htaccess)
  - [index.html](app\index.html)
- [backup/](backup)
  - [Database.sql](backup\Database.sql)
- [public/](public)
  - [assets/](public\assets)
  - [uploads/](public\uploads)
  - [.htaccess](public.htaccess)
  - [favicon.ico](public\favicon.ico)
  - [index.php](public\index.php)
  - [robots.txt](public\robots.txt)
- [src/](src)
  - [admin/](src\admin)
  - [common/](src\common)
  - [images/](src\images)
  - [public/](src\public)
- [tests/](tests)
- [writable/](writable)
- [.editorconfig](.editorconfig)
- [.env](.env)
- [.env.example](.env.example)
- [.eslintignore](.eslintignore)
- [.eslintrc.js](.eslintrc.js)
- [.gitignore](.gitignore)
- [.hintrc](.hintrc)
- [.php-cs-fixer.dist.php](.php-cs-fixer.dist.php)
- [.prettierignore](.prettierignore)
- [.prettierrc](.prettierrc)
- [.stylelintignore](.stylelintignore)
- [.stylelintrc](.stylelintrc)
- [branch-name-lint.json](branch-name-lint.json)
- [builds](builds)
- [commitlint.config.js](commitlint.config.js)
- [composer.json](composer.json)
- [composer.lock](composer.lock)
- [CONTRIBUTING.md](CONTRIBUTING.md)
- [gulpfile.js](gulpfile.js)
- [LICENSE](LICENSE)
- [lint-staged.config.js](lint-staged.config.js)
- [package-lock.json](package-lock.json)
- [package.json](package.json)
- [phpunit.xml.dist](phpunit.xml.dist)
- [preload.php](preload.php)
- [README.md](README.md)
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
| `npm run images`     | Minimiza el tamaño de las imágenes png/jpg/jpeg y las convierte a formatos ligeros como webp y avif, guardando todos los formatos de imagen para producción.                                                              |
| `npm run dev`        | Construye todos los activos necesarios para el proyecto, como Css, Js de todas las áreas (administración, pública y común) y al mismo tiempo, ejecuta el proyecto localmente. El servidor de desarrollo es accesible en http://localhost:8080. |


### Links
