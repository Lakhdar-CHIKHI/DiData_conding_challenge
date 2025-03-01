<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Node as NodeResource;

class Relation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'graph' => $this->graph,
            'parent' => $this->parent_node_id,
            'child' => $this->child_node_id,
        ];
    }
}
