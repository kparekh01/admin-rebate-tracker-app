<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
  public $table = 'file';
  public function form()
  {
    return $this->belongsTo('App/admin_rebate_tracker_db', 'form_id');
  }
}
