<?php

namespace App\Models;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
  use HasFactory, Filterable;

  protected $fillable = [
    'label',
    'description',
    'path',
    'pet_id',
    'mime_type',
    'size',
  ];

  private static $whiteListFilter = [
    'label',
    'mime_type',
  ];

  public function pet()
  {
    return $this->belongsTo(Pet::class, 'pet_id');
  }

  public static function filters(){
    return Picture::$whiteListFilter;
  }
}
