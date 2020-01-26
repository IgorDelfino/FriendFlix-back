<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user;
class Series extends Model
{
  public function users()
  {
      return $this->belongsTo(App\User);
  }

}
