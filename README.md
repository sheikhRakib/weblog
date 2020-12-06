<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



# weblog
Weblog is a web-based blog site project based on Laravel Framework (v8) where anyone can read blogs without authentication, though writing articles require membership. There are three types of members here, normal users (can manage articles of their own), moderators (responsible for maintaining the quality of contents), and admins(can give access to others and many more).

### Framework
1. Laravel (version 8)
2. AdminLTE

## Install
01. `git clone https://github.com/sheikhRakib/weblog.git`
02. `cd weblog`
03. `composer update`
04. `cp .env.example .env`
05. `php artisan key:generate`
06. `php artisan migrate --seed`
07. `php artisan serve`

## Default users 

username | password
---------|---------
admin    | 12345
moderator| 12345
user     | 12345 

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
