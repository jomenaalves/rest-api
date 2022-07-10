<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Pokes;
use Illuminate\Http\Request;

class PokeController extends Controller
{

    public function __construct(){}

    public function postGetPokes(){

        $res = Http::get('https://pokeapi.co/api/v2/pokemon/');
        $pokes = ($res->json())['results'];
        
        $save = Pokes::store($pokes);

        if($save->original['success']){
            return response()->json(['msg' => 'Pokemons added in database with successfuly', 'status' => 201], 201);
        }

        return response()->json(['msg' => 'Failed in add pokemons in database', 'status' => 500], 500);

    }

    public function postAddSpecificPoke(Request $request){

        $validated = $this->validate($request, [
            'name' => 'required|string|max:100',
            'url' => 'required|url'
        ]);

        Pokes::create($request->all());
        return response()->json(['msg' => 'Specific pokemon create with successfuly', 'status' => 201], 201);  
    }

    public function getListPokes(){
        $pokes = Pokes::all();

        return response()->json([$pokes], 200);
    }

    public function deletePoke(int $id){
        $poke = Pokes::find($id);

        if(!$poke) {
            return response()->json(['msg' => 'not found'], 404);
        }

        $poke->delete();
        return response()->json('success', 204);
    }
}
