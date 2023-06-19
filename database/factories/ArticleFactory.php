<?php

namespace Database\Factories;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titre_latin = $this->faker->unique()->sentence;
        $contenu_latin = $this->faker->unique()->paragraph;
        $traduction_fr = new GoogleTranslate('fr');
        $traduction_en = new GoogleTranslate('en');

        return [
            'titre' => $traduction_en->translate($titre_latin),
            'titre_fr' => $traduction_fr->translate($titre_latin),
            'contenu' => $traduction_en->translate($contenu_latin),
            'contenu_fr' => $traduction_fr->translate($contenu_latin),
            'user_id' => $this->faker->randomElement(User::pluck('id'))
        ];
    }
}
