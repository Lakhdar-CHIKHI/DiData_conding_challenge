<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GraphRequest;
use App\Models\Graph;
use App\Http\Resources\Graph as GraphResource;
use App\Http\Resources\Graph_ as GraphResource_;
use App\Http\Controllers\Api\BaseController as BaseController;

class GraphController extends BaseController
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CreateEmptyGraph()
    {

        $graph = Graph::create();
   
        return $this->sendResponse(new GraphResource($graph), 'Graph created successfully.');
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CreateGraph(GraphRequest $request)
    {
        $input = $request->all();
   
        $graph = Graph::create($input);
   
        return $this->sendResponse(new GraphResource($graph), 'Graph created successfully.');
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EditGraph(Request $request, $id)
    {
        $graph = Graph::find($id);
  
        if (is_null($graph)) {
            return $this->sendError('Graph not found.');
        }

        $graph->name = $request->name;
        $graph->description = $request->description;
        $graph->save();
   
        return $this->sendResponse(new GraphResource($graph), 'Graph updated successfully.');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $graph = Graph::findOrFail($id);
        $graph->delete();
   
        return $this->sendResponse([], 'Graph deleted successfully.');
    }

    public function AllGraph_meta_data()
    {
        $graphs = Graph::all();
    
        return $this->sendResponse(GraphResource_::collection($graphs), 'graphs retrieved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singleGraph($id)
    {
        $graph = Graph::find($id);
  
        if (is_null($graph)) {
            return $this->sendError('Graph not found.');
        }
   
        return $this->sendResponse(new GraphResource($graph), 'Graph retrieved successfully.');
    }

}
