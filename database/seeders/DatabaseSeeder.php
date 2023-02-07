<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Community;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        $comunidad = Community::factory()->create();
        $usuario = User::factory()->hasAttached($comunidad)->create();
        Post::factory()
            ->for($comunidad)
            ->for($usuario)
            ->has(Comment::factory()->for($usuario)->count(3))
            ->count(4)
            ->create();
        */
        $comunidad = Community::factory()->count(4)->create();
        $usuario = User::factory()->count(3)->hasAttached($comunidad[mt_rand(0,3)])->hasAttached($comunidad[mt_rand(0,3)])->create();
        $usuario->merge(User::factory()->count(3)->hasAttached($comunidad[mt_rand(0,3)])->hasAttached($comunidad[mt_rand(0,3)])->create());
        foreach ($comunidad as $com){
            foreach ($usuario as  $us){
                Post::factory()
                    ->for($com)
                    ->for($us)
                    ->has(Comment::factory()->for($us)->count(3))
                    ->count(4)
                    ->create();
            }
            }
        }
}
