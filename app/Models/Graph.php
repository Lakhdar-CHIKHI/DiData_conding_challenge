<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];
    
    public function nodes(){
        return $this->hasMany('App\Models\Node');
    }

    public function relations(){
        return $this->hasMany('App\Models\Relation');
    }
}
