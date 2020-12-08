<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Graph;
use App\Models\Node;
use App\Models\Relation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RandomGraph extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:gen {nbNodes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command should create a random graph with $nbNodes nodes and random relations.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $graph = Graph::create();
        $min;
        $max;
        for ($i=0; $i < $this->argument('nbNodes'); $i++) { 
            $node = new Node();
            $node->graph_id = $graph->id;
            $node->save();
            if ($i == 0) {
                $min = $node->id;
            }
            if ($i == ($this->argument('nbNodes')-1)) {
                $max = $node->id;
            }
        } 
        for ($i=0; $i < $this->argument('nbNodes'); $i++) { 
            $rand_parent = rand($min,$max);
            $rand_child = rand($min,$max);
            if ($rand_parent == $rand_child) {
                $this->info('must be the different nodes.');
            }else{
                $keyExists = DB::table('relations')
                            ->where('parent_node_id', '=', 2)
                            ->where('child_node_id', '=', 3)
                            ->get();
                if (!$keyExists->isEmpty()) {
                    $this->info('this relationship has already existed.');
                }
                $relation->parent_node_id = $rand_parent;
                $relation->child_node_id = $rand_child;
                $relation->graph_id = $graph->id;
                $relation->save();
            }
        }

        return 0;
    }
}
