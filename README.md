# Simple Bookstore App

![Cover](https://github.com/alfonsusac/bookstore/blob/master/cover.png)

Laravel Web Programming Lecture Project for Web Programming Course @BinusUniversity 

## About

A simple Laravel application for listing books and do transactions.

### Built-with

- Laravel 8

### Documentations

[Notion Page](https://alfonsusardani.notion.site/Simple-Bookstore-Website-82f604a268d8457a9228052fce16ef01)

[Complete Documentation](https://github.com/alfonsusac/bookstore/raw/master/Documentation.pdf)

## Setup Guide

The project is intended to be run on windows machine as it is build in there.

### Requirements

1. Composer
2. XAMPP
3. A new database called "webproguas"

### Setup

1. Clone the repository
2. On root folder, run `composer install` using command prompt
3. Then run `php artisan migrate:fresh`
4. Then run `php artisan config:cache`
5. Then run `php artisan serve` to host the website.
6. Access via http://localhost:8000/

### Default Accounts

1. (Admin Access) Username: `admin@a.com` | Pass: `password`
2. (Member Access) Username: `user@a.com` | Pass: `password`

## License

MIT

## Acknowledgements

My Web Programming Lecturer, Mr. Pualam


