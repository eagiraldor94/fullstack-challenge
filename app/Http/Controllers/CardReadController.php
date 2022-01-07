<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class CardReadController extends Controller
{
    /**
     * Returns a list (array) of task cards with attributes.
     *
     * @return JSON -> array of users
     */
   public static function getCards(Request $request){
        
        $bufferCards = Card::where('category_id',1)->get();
        $workingCards = Card::where('category_id',2)->get();
        $doneCards = Card::where('category_id',3)->get();

        $responseObj = new \stdClass();
        $responseObj->buffer = $bufferCards;
        $responseObj->working = $workingCards;
        $responseObj->done = $doneCards;

        return response()->json($responseObj);
   }
}
