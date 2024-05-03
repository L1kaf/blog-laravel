### Linter status:

[![Tests and Linter](https://github.com/L1kaf/blog-laravel/actions/workflows/main.yml/badge.svg)](https://github.com/L1kaf/blog-laravel/actions/workflows/main.yml)
[![Maintainability](https://api.codeclimate.com/v1/badges/9633132285e8acd613d8/maintainability)](https://codeclimate.com/github/L1kaf/blog-laravel/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/9633132285e8acd613d8/test_coverage)](https://codeclimate.com/github/L1kaf/blog-laravel/test_coverage)

### Description:
---
This repository is a blog on Laravel. It uses free bootstrap templates, AdminLTE, Summernote.

In this blog you can add posts with photos, categories, and tags to them. Also, each user can put likes and write comments under the posts. SQLite was used for implementation in the test project. A queue for adding users is used. The admin panel is also used. Only administrators have access to it.

### System Requirements:
---
* PHP version 8+
* Composer

### Usage:
---
```bash
make setup
make start
```
Open in browser: http://127.0.0.1:8000

In order to display photos in posts, you need to specify a link in Laravel:
```bash
php artisan storage:link
```
