# mogitate

## 環境構築
- git clone git@github.com:katoketa/mogitate.git
- cd mogitate
- docker-compose up -d --build
- docker-compose exec php bash
- composer install
- cp .env.example .env , 環境変数を適宜変更
- php artisan key:generate
- php artisan migrate
- php artisan db:seed

## 使用技術（実行環境）
- Laravel 12.40.2
- PHP 8.4.12
- nginx 1.21.1
- MySQL 8.0.26

## ER図
<img width="1501" height="311" alt="Image" src="https://github.com/user-attachments/assets/a25508ad-88c0-4f3c-b872-a4879dc620c6" />

## URL
- 商品一覧ページ http://localhost/products