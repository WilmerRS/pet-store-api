<?php

namespace App\Models;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
  use HasFactory, Filterable;

  protected $fillable = [
    'name',
    'slug',
    'description',
    'status_id',
    'category_id',
  ];
  protected $hidden = [
    'id',
    'is_active',
    'deleted_at',
  ];

  private static $whiteListFilter = [
    'name',
    'slug',
    'description',
    'status_id',
    'category_id',
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id');
  }

  public function status()
  {
    return $this->belongsTo(Status::class, 'status_id');
  }

  public static function filters(){
    return Pet::$whiteListFilter;
  }

}
