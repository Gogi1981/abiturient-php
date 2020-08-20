<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spreadsheet extends Model
{
   protected $guarded = [];

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;


}
