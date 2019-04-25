<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
  public function scopeFilter($query, $params)
  {
    if ( isset($params['search']) && trim($params['search'] !== '') ) {
      $search = trim($params['search']);
      $query->where(function ($q) use ( $search ) {
      	$q->where('name', 'ilike', "%$search%");
      	$q->orWhere('brewery', 'ilike', "%$search%");
      });
    }
    return $query;
  }
}
