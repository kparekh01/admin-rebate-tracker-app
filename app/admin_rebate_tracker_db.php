<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_rebate_tracker_db extends Model{
  public $table = "forms";
  public function files()
  {
      return $this->hasMany('File', 'form_id');
  }
}
