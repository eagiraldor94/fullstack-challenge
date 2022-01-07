<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class CardStoreController extends Controller
{
    /**
     * Stores a card as new if doesnt exists or update it. Then returns updated cards list
     *
     * @return JSON -> array of users
     */
    public function storeCard(Request $request){

        $request->validate([
            'id' => 'required',
            'task' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'end_date' => 'required',
            'color' => 'required'
        ]);

        if ((int)$request->id > 0) {
            $card = Card::find($request->id);
        }else{
            $card = new Card();
        }
        $card->task = $request->task;
        $card->category_id = $request->category_id;
        $card->user_id = $request->user_id;
        $card->color = $request->color;
        $card->end_date = $request->end_date;
        $card->save();

        return CardReadController::getCards($request);
    }
}
