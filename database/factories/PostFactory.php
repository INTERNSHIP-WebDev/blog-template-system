<?php
use Faker\Generator as Faker;
use App\Models\Post;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Post::class, function(Faker $generator) {
        return [
            'title' => $generator->sentence(),
            'body'=> $generator->text(1000)
        ];
});