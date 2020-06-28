<p align="center"><img src="https://hiyanxyz.github.io/media/posts/9/responsive/logo-xs.png" width="100"></p>

## About lavuta

Lavuta is a boilerplate web application consists of

- [Laravel Framework](https://laravel.com).
- [Vuejs Framework](https://vuejs.org).
- [Tailwindcss Framework](https://tailwindcss.com).

Lavuta tries to follow

- MVC Application Development.
- [Modular Application Structure](https://blog.fedecarg.com/2008/06/28/a-modular-approach-to-web-development/).
- [Best Design Pattern Practices](https://medium.com/@ivorobioff/the-5-most-common-design-patterns-in-php-applications-7f33b6b7d8d6).
- [Clean Code PHP](https://github.com/jupeter/clean-code-php)
- [Clean Code JS](https://github.com/ryanmcdermott/clean-code-javascript)
- [Clean Code HTML/CSS](https://www.smashingmagazine.com/2008/11/12-principles-for-keeping-your-code-clean/)

> Lavuta's vision is to be an easy to use, clean and expandable boilerplate project. 

## Laravel

Following Laravel packages are installed and configured by default

- [laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
- [laravel-modules](https://nwidart.com/laravel-modules/)
- [composer-merge-plugin](https://github.com/wikimedia/composer-merge-plugin)
- [laravel/telescope](https://laravel.com/docs/7.x/telescope)
- [laravel/socialite](https://laravel.com/docs/7.x/socialite)
- [laravel/passport](https://laravel.com/docs/7.x/passport) 
- [laravel/ui](https://github.com/laravel/ui)
- [image](https://github.com/Intervention/image)
- [eloquent-sluggable](https://github.com/cviebrock/eloquent-sluggable)
- [laravel-permission](https://github.com/spatie/laravel-permission)
- [prettus/l5-repository](https://github.com/andersao/l5-repository)

## Vuejs

-

## Tailwindcss

-

## Installation instruction

- run `$ git clone https://github.com/mrlinnth/lavuta`
- create new database
- create .env file with correct database info
- run `$ composer install`
- run `$ php artisan migrate`
- run `$ php artisan passport:install`
- run `$ php artisan key:generate`
- run `$ php artisan passport:install --force`
- enter UI module directory `$ cd Modules/Ui`
- run `$ npm install`
- run `$ npm run dev`