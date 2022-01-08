<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

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

  public function getRouteKeyName()
  {
    return 'slug';
  }

  private static $whiteListFilter = [
    'name',
    'slug'
  ];

  public function pets()
  {
    return $this->hasMany(Pet::class, 'category_id');
  }

  public static function filters(){
    return Category::$whiteListFilter;
  }
}
