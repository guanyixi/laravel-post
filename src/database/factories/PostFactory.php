<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(7),
            'slug' => $this->faker->unique()->slug(),
            'featured_image' => 'https://laravelposts.dev/storage/thumbnails/post' . rand(1, 10) . '.jpeg',
            'excerpt' => $this->faker->paragraph(2),
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'category_id' => rand(1, 5),
            'author_id' => rand(1, 3),
            'status_id' => 2,
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            'published_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)
        ];
    }
}
