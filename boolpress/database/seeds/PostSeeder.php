<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Post;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 15; $i++){
            $newPost = new Post;
            $newPost->title = $faker->sentence();
            $newPost->content = $faker->text(500);

            $user = User::all();

            $user = $user->toArray();

            $userCount = Count($user);

            $newPost->user_id = rand(1, $userCount);
            $slug =  Str::slug($newPost -> title);
            $slugIniziale = $slug;

            $postPresente = Post::where('slug', $slug)->first();
            $contatore = 1;

            while($postPresente){
                $slug = $slugIniziale .'-' .$contatore;
                $postPresente = Post::where('slug', $slug)->first();
                $contatore++;
            }

            $newPost->slug = Str::slug($newPost -> title);
            
            $newPost -> save();
        }
    }
}
