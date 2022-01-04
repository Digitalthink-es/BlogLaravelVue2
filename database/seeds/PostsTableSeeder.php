<?php

use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate(); // Limpia la tabla

        $post = new Post();
        $post->title = "Mi primer post";
        $post->url = str_slug($post->title);
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post<p>";
        $post->published_at = Carbon::now()->subDays(4); // El post fue realizado hace 4 días
        $post->category_id = 1;

        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 3']));


        $post = new Post();
        $post->title = "Mi segundo post";
        $post->url = str_slug($post->title);
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Contenido de mi segundo post<p>";
        $post->published_at = Carbon::now()->subDays(3); // El post fue realizado hace 3 días;
        $post->category_id = 1; 
        
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 4']));

        $post = new Post();
        $post->title = "Mi tercer post";
        $post->url = str_slug($post->title);
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post<p>";
        $post->published_at = Carbon::now()->subDays(2); // El post fue realizado hace 2 días;
        $post->category_id = 1;

        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 5']));

        $post = new Post();
        $post->title = "Mi cuarto post";
        $post->url = str_slug($post->title);
        $post->excerpt = "Extracto de mi cuarto post";
        $post->body = "<p>Contenido de mi cuarto post<p>";
        $post->published_at = Carbon::now()->subDays(1); // El post fue realizado hace 1 día;
        $post->category_id = 2;          

        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 6']));

        $post = new Post();
        $post->title = "Mi quinto post";
        $post->url = str_slug($post->title);
        $post->excerpt = "Extracto de mi quinto post";
        $post->body = "<p>Contenido de mi quinto post<p>";
        $post->published_at = Carbon::now();
        $post->category_id = 2; 
        
        $post->save();
        
        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 7']));
    }
}
