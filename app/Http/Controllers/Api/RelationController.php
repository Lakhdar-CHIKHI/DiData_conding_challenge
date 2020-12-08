<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RelationRequest;
use App\Models\Relation;
use App\Models\Node;
use App\Http\Resources\Relation as RelationResource;
use App\Http\Controllers\Api\BaseController as BaseController;

class RelationController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddRelation(RelationRequest $request)
    {
   
        if ($request->parent_node_id == $request->child_node_id) {
            return $this->sendResponse([], 'must be the different nodes.');
        }

        $graph_parent_id = Node::find($request->parent_node_id)->graph->id;
        $graph_child_id = Node::find($request->child_node_id)->graph->id;
        if ($graph_parent_id != $graph_child_id) {
            return $this->sendResponse([], 'must be the nodes include in the same graph.');
        }
        
        $relation = new Relation();
        $relation->parent_node_id = $request->parent_node_id;
        $relation->child_node_id = $request->child_node_id;
        $relation->graph_id = $graph_parent_id;
        $relation->save();
   
        return $this->sendResponse(new RelationResource($relation), 'Reltion Added successfully.');
    } 
}
