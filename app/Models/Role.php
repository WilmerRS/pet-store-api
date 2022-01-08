<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'slug',
    'description',
  ];

  protected $hidden = [
    'id'
  ];

  public static function userRoleId()
  {
    return Role::where('slug', 'user')->first()->id;
  }

  public function users()
  {
    return $this->belongsToMany(User::class);
  }
}
