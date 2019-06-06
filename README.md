<p align="center">
    <img src="https://github.com/psgganesh/anchor/blob/master/public/anchor-90.png?raw=true" />
    <h2 align="center">Anchor</h2>
</p>

This package will help you create an SPA front-end and API back-end application built with laravel v 5.8 and nuxtjs 2.6 popular community packages as a base. 

## Version Information
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fpsgganesh%2Fanchor.svg?type=small)](https://app.fossa.com/projects/git%2Bgithub.com%2Fpsgganesh%2Fanchor?ref=badge_small)

 Version   | Illuminate    | Status                  | PHP Version
:----------|:--------------|:------------------------|:------------
 1.0       | 5.8.x - 5.x.x | Active support :rocket: | >= 7.1.3

## Packages used
Popular community packages used so far are

- [laravel/passport](https://github.com/laravel/passport)
- [fideloper/proxy](https://github.com/fideloper/TrustedProxy)
- [owen-it/laravel-auditing](https://github.com/owen-it/laravel-auditing)
- [spatie/laravel-cors](https://github.com/spatie/laravel-cors)
- [spatie/laravel-fractal](https://github.com/spatie/laravel-fractal)
- [spatie/laravel-permission](https://github.com/spatie/laravel-permission)
- [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
- [beyondcode/laravel-dump-server](https://github.com/beyondcode/laravel-dump-server)

## Installation

``` bash
# For laravel
$ composer install
$ php artisan migrate
$ php artisan passport:keys

# For creating new modules
$ php artisan make:module <Modulename>

# For publishing it's migrations / seeds / config files
$ php artisan module:publish <Modulename>

# For nuxtJS
# install dependencies and build SPA
$ npm install
$ npm run build
```

> Note on the API - Over the laravel end, 
 - We are using Repository and Module pattern. More information [On this blog post](https://www.larashout.com/how-to-use-repository-pattern-in-laravel?ref=laravelnews)
 - To get a basic idea on how the Modules are being used, please read [this blog post](https://hackernoon.com/simple-and-complete-module-based-laravel-app-5fee7a21bf28) about modularizing your laravel apps.


## Credits
Anchor is built on the Laravel web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling; the application framework takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## License
The **Anchor** project is open source software licensed under the [GNU Lesser General Public License v 3.0](LICENSE).

[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fpsgganesh%2Fanchor.svg?type=large)](https://app.fossa.com/projects/git%2Bgithub.com%2Fpsgganesh%2Fanchor?ref=badge_large)
