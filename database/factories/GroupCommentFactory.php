<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupCommentFactory extends Factory
{
    public function definition()
    {
        return [
            'text' => $this->faker->randomElement(['a+1', '哈囉', '闆娘好漂亮', '改+1', '白藍28+1']),
            'feed_id' => $this->faker->isbn13(),
        ];
    }
}
