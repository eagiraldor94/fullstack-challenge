<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /**
     * Returns the user who have assigned this task card
     * @author Ever Giraldo <ever.giraldo@gmail.com>
     * @since 2022-01-06
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the category where is located this card task
     * @author Ever Giraldo <ever.giraldo@gmail.com>
     * @since 2022-01-06
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
