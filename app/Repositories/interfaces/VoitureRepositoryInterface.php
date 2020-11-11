<?php
namespace App\Repositories\interfaces;

use App\Models\Voiture;

interface VoitureRepositoryInterface {

    public function all();

    public function getById(int $id);

    public function save(Voiture $voiture);

    public function update(Voiture $voiture);

    public function delete(int $id);


}
