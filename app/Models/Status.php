<?php

namespace App\Models;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  use HasFactory, Filterable;

  protected $fillable = [
    'name',
    'slug',
    'description',
  ];

  protected $hidden = [
    'id',
    'is_active',
    'deleted_at',
  ];

  private static $whiteListFilter = [
    'name',
    'slug'
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function pets()
  {
    return $this->hasMany(Pet::class, 'status_id');
  }

  public static function filters(){
    return Status::$whiteListFilter;
  }
}
