<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Repositories\interfaces\VoitureRepositoryInterface;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    var $voitureRepository;

    public function __construct(VoitureRepositoryInterface $voitureRepository){

        $this->voitureRepository=$voitureRepository;
    }

    public function index(){
        //$voitures=Voiture::all();
        $voitures=$this->voitureRepository->all();
        return response()->json($voitures);
    }

    public function getVoiture($id){
        //$voiture=Voiture::where('id',$id)->first();
        $voiture=$this->voitureRepository->getById($id);

        return response()->json($voiture);


    }

    public function save(Request $request){
        //validations...
        $validateData=$this->validateRequest($request);


        $voiture= new Voiture([
            'marque' => $request->get('marque'),
            'modele' => $request->get('modele'),
            'couleur'=> $request->get('couleur'),
            'photo'  => $request->get('photo')

        ]);
        //$voiture->save();

        $this->voitureRepository->save($voiture);

        return response()->json($voiture);
    }
    public function update(Request $request){

        //validations...
        $validateData=$this->validateRequest($request);

        $voiture= new Voiture([
            'id'     => $request->get('id'),
            'marque' => $request->get('marque'),
            'modele' => $request->get('modele'),
            'couleur'=> $request->get('couleur'),
            'photo'  => $request->get('photo')

        ]);



        /* Voiture::find($request->get('id'))
        ->update([
            'marque'=>$request->get('marque'),
            'modele' =>$request->get('modele'),
            'couleur' =>$request->get('couleur'),
            'photo' =>$request->get('photo')

        ]); */

        $this->voitureRepository->update($voiture);


        return response()->json($this->voitureRepository->getById($request->get('id')));
    }

    public function delete($id){
        /* if(Voiture::where('id',$id)->delete()){
            return response()->json(["status" =>'suppression effectué'],200);
        } */

        if($this->voitureRepository->delete($id)){
            return response()->json(["status" =>'suppression effectué'],200);
        }

        return response()->json(["status" =>'Erreur suppression'],500);
    }

    private function validateRequest($request){
        $request->validate([
            'marque' => 'required|max:60',
            'modele' => 'required|max:60',
            'couleur'=> 'nullable',
            'photo'  => 'nullable|max:255'
        ]);

    }

}
