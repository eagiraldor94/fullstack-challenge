<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    /**
     * Returns the cards with tasks assigned to the category
     * @author Ever Giraldo <ever.giraldo@gmail.com>
     * @since 2022-01-06
     */
    public function cards(){
        return $this->hasMany(Card::class);
    }
}
