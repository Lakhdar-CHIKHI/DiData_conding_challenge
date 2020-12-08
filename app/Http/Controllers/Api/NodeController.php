<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NodeRequest;
use App\Models\Node;
use App\Http\Resources\Node as NodeResource;
use App\Http\Controllers\Api\BaseController as BaseController;

class NodeController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddNode(NodeRequest $request)
    {
        $input = $request->all();
   
        $node = Node::create($input);
   
        return $this->sendResponse(new NodeResource($node), 'Node Added successfully.');
    } 


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $node = Node::findOrFail($id);
        $node->delete();
   
        return $this->sendResponse([], 'Node deleted successfully.');
    }
}
