<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        //imagen aleatoria
        $dir_path = public_path('sample_images');
        $files = scandir($dir_path);
        $count = count($files);
        $index = rand(2, ($count-1));
        $filename = $files[$index];

        return [
            'user_id' => User::all()->random(1)->first()->id,
            'image_path' => "sample_images/".$filename,
            'description' => $this->faker->text(),
            "created_at" => now(),
        ];
    }
}
