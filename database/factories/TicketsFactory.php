<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TaskStatus;
use App\Models\Tickets;
use App\Models\User;
class TicketsFactory extends Factory
{

     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tickets::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => "What is Lorem Ipsum?",
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry",
            'status' => TaskStatus::inRandomOrder()->limit(1)->first()->id,
            'client_id' => User::where('is_admin', 0)->inRandomOrder()->limit(1)->first()->id,
            'assigned_to' => User::where('is_admin', 1)->inRandomOrder()->limit(1)->first()->id
        ];
    }
}
