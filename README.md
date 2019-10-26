# dope-blog

## Installation

To download this project, run the following command
```
  git clone https://github.com/bryceandy/dope-blog.git && cd dope-blog
```

## Usage

Create a copy of the environment variables
```
  cp .env.example .env
```
Install relevant dependencies first
```
composer install
npm install
```

Then create an app key with the artisan command
```
  php artisan key:generate
```

Boot up your server 
```
  php artisan serve
```

Lastly run your migrations.
```
  php artisan migrate
```
