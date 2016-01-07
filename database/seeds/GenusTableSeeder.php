<?php

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create(['label' => 'Artes e Fotografia']);
        Gender::create(['label' => 'Viagem']);
        Gender::create(['label' => 'Infantil']);
        Gender::create(['label' => 'Teen']);
        Gender::create(['label' => 'Metodologia de Pesquisa']);
        Gender::create(['label' => 'Sustentabilidade']);
        Gender::create(['label' => 'Videogames']);
        Gender::create(['label' => 'Autoajuda']);
        Gender::create(['label' => 'Biografias']);
        Gender::create(['label' => 'Administração']);
        Gender::create(['label' => 'Ciências Biológicas']);
        Gender::create(['label' => 'Ciências Exatas']);
        Gender::create(['label' => 'Ciências Sociais']);
        Gender::create(['label' => 'Comportamento']);
        Gender::create(['label' => 'Comunicação']);
        Gender::create(['label' => 'Dicionários']);
        Gender::create(['label' => 'Didáticos']);
        Gender::create(['label' => 'Direito']);
        Gender::create(['label' => 'Economia']);
        Gender::create(['label' => 'Engenharia']);
        Gender::create(['label' => 'Educação']);
        Gender::create(['label' => 'Concursos Públicos']);
        Gender::create(['label' => 'Ensino de Línguas']);
        Gender::create(['label' => 'Esoterismo']);
        Gender::create(['label' => 'Esportes e Lazer']);
        Gender::create(['label' => 'Filosofia']);
        Gender::create(['label' => 'Geografia']);
        Gender::create(['label' => 'História']);
        Gender::create(['label' => 'Gastronomia']);
        Gender::create(['label' => 'HQs']);
        Gender::create(['label' => 'Humor e Entretenimento']);
        Gender::create(['label' => 'Informática e Tecnologia']);
        Gender::create(['label' => 'LGBT']);
        Gender::create(['label' => 'Literatura Internacional']);
        Gender::create(['label' => 'Literatura Nacional']);
        Gender::create(['label' => 'Medicina']);
        Gender::create(['label' => 'Pets']);
        Gender::create(['label' => 'Arquitetura']);
        Gender::create(['label' => 'Psicologia']);
        Gender::create(['label' => 'Religião']);
        Gender::create(['label' => 'Saúde, Fitness e Beleza']);
    }
}
