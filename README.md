<p align="center">
    <img src="https://github.com/psgganesh/anchor/blob/master/public/anchor-90.png?raw=true" />
    <h2 align="center">Anchor</h2>
</p>

This package will help you create an SPA front-end and API back-end application built with laravel v 5.8 and nuxtjs 2.6 popular community packages as a base. 

## Version Information ✨
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fpsgganesh%2Fanchor.svg?type=shield)](https://app.fossa.com/projects/git%2Bgithub.com%2Fpsgganesh%2Fanchor?ref=badge_shield)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/049d71dd3aab4b3c8b3674c5d3aa8905)](https://www.codacy.com/app/psgganesh/anchor?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=psgganesh/anchor&amp;utm_campaign=Badge_Grade)



 Version   | Illuminate    | Status                  | PHP Version
:----------|:--------------|:------------------------|:------------
 1.0       | 5.8.x - 5.x.x | Active support :rocket: | >= 7.1.3

## Packages used for API 📦
Popular community packages used so far are

- [laravel/passport](https://github.com/laravel/passport)
- [fideloper/proxy](https://github.com/fideloper/TrustedProxy)
- [owen-it/laravel-auditing](https://github.com/owen-it/laravel-auditing)
- [spatie/laravel-cors](https://github.com/spatie/laravel-cors)
- [spatie/laravel-fractal](https://github.com/spatie/laravel-fractal)
- [spatie/laravel-permission](https://github.com/spatie/laravel-permission)
- [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
- [beyondcode/laravel-dump-server](https://github.com/beyondcode/laravel-dump-server)

## Packages used for Front-end 📦

- nuxt- v2.4.0
- axios- v0.18.0
- @nuxtjs/router- v1.0.1
- bootstrap- v4.1.1
- bootswatch- v4.3.1
- dotenv- v5.0.1
- font-awesome- v4.7.0
- jquery- v3.4.0
- js-cookie- v2.2.0
- sweetalert2- v7.19.3
- vform- v1.0.0
- vue-i18n- v7.6.0


## Installation  🎉

> Dependency 
``` bash
# For laravel
$ composer install
$ php artisan migrate
$ php artisan passport:install
```

### For production deployment of passport - please check laravel documentation for below command
```bash
$ php artisan passport:keys
```

### For creating new modules
```bash
$ php artisan make:module <Modulename>
```

### For publishing it's migrations / seeds / config files
```bash
$ php artisan module:publish <Modulename>
```

### For nuxtJS - install dependencies and build SPA
```bash
$ npm install
$ npm run build
```

> Note on the API - Over the laravel end, 
 - We are using Repository and Module pattern. More information [On this blog post](https://www.larashout.com/how-to-use-repository-pattern-in-laravel?ref=laravelnews)
 - To get a basic idea on how the Modules are being used, please read [this blog post](https://hackernoon.com/simple-and-complete-module-based-laravel-app-5fee7a21bf28) about modularizing your laravel apps.


## Credits 🙌
Anchor is built on the Laravel web application framework and nuxtJS; this project boilerplate would not be possible without contributions from 

- [Taylor Otwell](https://github.com/taylorotwell) - For laravel framework
- [NuxtJS Contributors](https://github.com/nuxt/nuxt.js)
- [Spatie](https://github.com/spatie) - For all the packages till now 
- [Cretu Eusebiu](https://github.com/cretueusebiu) - For reference on nuxt js integration of nuxt js 1.4.0
- [Larashout](https://www.larashout.com/how-to-use-repository-pattern-in-laravel) - For laravel repository pattern article
- [Marco Aurélio Deleu](https://hackernoon.com/simple-and-complete-module-based-laravel-app-5fee7a21bf28) - Simple component based dev. blog post

## License 📜
The **Anchor** project is open source software licensed under the [MIT License](LICENSE).

## Pull Requests and Contributions 🙏
> Always open for improvements
