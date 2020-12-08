<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;

    public function graph()
    {
        return $this->belongsTo('App\Models\Graph');
    }

    protected $fillable = [
        'parent_node_id',
        'child_node_id',
    ];


    public $timestamps = false;
}
