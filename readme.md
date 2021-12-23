# https://aprendible.com/series/desarrollo-blog

## Ubicación y descarga del proyecto
	https://github.com/Digitalthink-es/BlogLaravelVue2

## 1. Integrando la plantilla HTML
### Repositorio de código
	https://github.com/aprendible/curso-blog/
### Plantilla del curso
	https://aprendible.nyc3.cdn.digitaloceanspaces.com/static/blog.zip
### Creación del proyecto
	composer create-project laravel/laravel blog "5.5.*"
### Sustituir html por texto de plantillas
	Copiar carpetas css e img (contenidas dentro de la carpeta Maquetación) en la ruta public del proyecto de laravel
### Crear archivo layout.blade.php
	Contendrá los elementos reutilizables (cabecera, pie, etc.)
	Se ubica en la carpeta resources/views

## 2. Creando la tabla posts
	Crear base de datos blogLaravelVue2 en mysql
	![Creación base de datos](imagenesReadme/creacionBaseDatos.png) 
### Crear las tablas ejecutando las migraciones
	php artisan migrate
### Crear modelo para los posts y la migración
	php artisan make:model Post -m
	php artisan migrate
	
## 3. Mostrando los posts desde la base de datos

## 4. Mostrando la fecha de publicación de los posts
	Los campos created_at y updated_at se tratan por defecto como una instancia de tipo Carbon
	Para que una variable de tipo fecha creada manualmente sea tratada de tipo Carbon hay que especificarlo en el modelo
	class Post extends Model
	{
	    protected $dates = ['published_at']; // Trata la fecha creada como instancia de tipo Carbon
	}