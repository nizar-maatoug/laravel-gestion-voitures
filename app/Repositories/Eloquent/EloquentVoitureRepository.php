<?php
namespace App\Repositories\Eloquent;

use App\Models\Voiture;
use App\Repositories\interfaces\VoitureRepositoryInterface;

class EloquentVoitureRepository implements VoitureRepositoryInterface{

    public function all(){

        return Voiture::all();

    }

    public function getById(int $id){

        return Voiture::where('id',$id)->first();

    }

    public function save(Voiture $voiture){

        $voiture->save();
        return $voiture;

    }

    public function update(Voiture $voiture){

        return Voiture::find($voiture->get('id'))->first()
        ->update([
            'marque'=>$voiture->get('marque'),
            'modele' =>$voiture->get('modele'),
            'couleur' =>$voiture->get('couleur'),
            'photo' =>$voiture->get('photo')

        ]);

    }

    public function delete(int $id){

        return Voiture::where('id',$id)->delete();

    }



}
