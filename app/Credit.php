<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model {

    protected $fillable = ['date', 'suivi00', 'suivi30', 'suivi60', 'suivi90'];

}
