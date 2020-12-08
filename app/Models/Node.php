<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    protected $fillable = [
        'graph_id'
    ];

    public function graph()
    {
        return $this->belongsTo('App\Models\Graph');
    }
    

    public $timestamps = false;


    // public function relations()
    // {
    //     return $this->hasMany('App\Models\Relation');
    // }
}
