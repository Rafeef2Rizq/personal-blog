<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title=$this->faker->monthName;
        $categoryIds = Category::pluck('id')->toArray();

        return [
            'title'=>$title,
            'slug'=>Str::slug($title),
            'excerpt'=>$this->faker->realText(50),
            'content'=>$this->faker->text(100),
            'status'=>$this->faker->randomElement(['draft','published','scheduled']),
            'category_id'=>$this->faker->randomElement($categoryIds),
            'image'=>$this->faker->imageUrl
        ];
    }
}
