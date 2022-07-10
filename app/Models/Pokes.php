<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pokes extends Model 
{

    use HasFactory;

    protected $fillable = [
        'name', 'url',
    ];

    public static function store(Array $pokes){

        try {

            foreach ($pokes as $poke) {
                Pokes::create([
                    'name' => $poke['name'],
                    'url' => $poke['url']
                ]);
            }

            return response()->json(['success' => true], 500);

        } catch (\Throwable $th) {
            return response()->json(['success' => false], 500);
        }
    }
}
