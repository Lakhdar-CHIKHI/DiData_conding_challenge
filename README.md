# DiData - Conding challenge Laravel

# Presentation of the challenge
### In this challenge, we'll create a Rest API Laravel.
* #### Part one: generate endpoints to create the graphs, their nodes, and relations between nodes.
* #### Part two: generate the artisan commands.

# Developement
## Models :
* ### Graph :
    * #### Each graph has an id, a unique name, description, created_at and     updated_at;
    * #### Each graph can have a set of nodes;
* ### Node :
    * #### Each node has an id;
    * #### Node has only one graph;
    * #### Nodes can be linked with relation;
* ### Relation :
    * #### Each relation has parent node and child node;
    * #### relation has only one graph;

## EndPoints :
|      Method   |  Routes   |      Actions   |  
|----------|:-------------:|:-------------:|
|      POST   |  api/empty_graph |  CreateEmptyGraph() | 
|      POST   |  api/graph |  CreateGraph(...) | 
|      PUT   |  api//graph/{id} |  EditGraph(...) | 
|      DELETE   |  api/graph/{id} |  destroy(...) | 
|      GET   |  api/graphs |  AllGraph_meta_data() | 
|      GET   |  api/graphs/{id |  singleGraph(...) | 
|      POST   |  api/node |  AddNode(...) | 
|      DELETE   |  api/node/{id} |  destroy(...) | 
|      POST   |  api/relation |  AddRelation(...) | 

## Artisan Commands :
* ### php artisan graph:gen {nbNode} 
    * #### This command should create a random graph with {nbNode}  nodes and random relations.
* ### php artisan graph:clear
    *  #### This command should delete all empty graphs.
* ### php artisan graph:stats {id}
    * #### This command display graphs stats (display the graph meta data, number of nodes, number of relations) by graph id.

# Data Base :
* ### MySql
