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
	php artisan make:model Post -m  # Con -m se crea la migración
	php artisan migrate
	
## 3. Mostrando los posts desde la base de datos

## 4. Mostrando la fecha de publicación de los posts
	Los campos created_at y updated_at se tratan por defecto como una instancia de tipo Carbon
	Para que una variable de tipo fecha creada manualmente sea tratada de tipo Carbon hay que especificarlo en el modelo
	class Post extends Model
	{
	    protected $dates = ['published_at']; // Trata la fecha creada como instancia de tipo Carbon
	}

## 5. Creando las categorías
	php artisan make:model Category -m  # Con -m se crea la migración
	php artisan migrate

## 6. Qué son y cómo se utilizan los seeders
	Creación de seeder para los posts php artisan make:seeder PostsTableSeeder
	Creación de seeder para las categorías php artisan make:seeder CategoriesTableSeeder
	Referenciar los seeders en el archivo DatabaseSeeder
    public function run()
    {
         $this->call(PostsTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
    }	

	Ejecutar el seeder
		php artisan db:seed

	Para ejecutar las migraciones y la ejecución de seeds en un único comando
		php artisan migrate:refresh --seed

## 7. Creando las etiquetas
	Es una relación muchos a muchos (1 post puede tener muchas etiquetas y cada etiqueta puede estar referenciado por muchos posts)
	php artisan make:model Tag -m # Con -m se crea la migración
	php artisan migrate
	Para crear la relación entre posts y etiquetas se crea una tabla intermedia que tenga los identifiadores relacionados
		php artisan make:migration create_post_tag_table --create=post_tag # La convención establece el nombre de las tablas en singular y por orden alfabético (ordenación desde la a hasta la z). Con create se indica que se creará la tabla y se utiliza el caracter _ para separar los elementos. Con --create=post_tag indicamos el nombre de la tabla

	En el archivo Post creamos funcion tags para recuperar las etiquetas de un post
    // 1 post puede tener muchas etiquetas
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

	En la vista se recorren todas las etiquetas de un post y se muestra el nombre
	@foreach ($post->tags as $tag)
		<span class="tag c-gray-1 text-capitalize">{{ $tag->name }}</span>
	@endforeach

## 8. Integrando la plantilla de administración LTE
	https://github.com/ColorlibHQ/AdminLTE/releases/tag/v2.3.11

	Crear carpeta adminlte dentro de public

	Copiar carpeta css, img y js del directorio dist dentro de public

	Copiar las carpetas bootstrap y plugins dentro de public

	Copiar el contenido del archivo starter.html en un nuevo archivo resources/views/admin/layout.blade.php

	Crear archivo resources/views/admin/dashboard.blade.php

	Modificar contenido de web.php, para incluir ruta a la página del dashboard
		Route::get('/admin', function () {
			return view('admin.dashboard');
		});

		Para acceder a esta página http://localhost:8000/admin
