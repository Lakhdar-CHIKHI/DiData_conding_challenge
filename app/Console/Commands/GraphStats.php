<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Graph;
use App\Models\Node;


class GraphStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:stats {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command display graphs stats (display the graph meta data, number of nodes, number of relations) by graph id.';

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
        $graph = Graph::find($this->argument('id'));
        $headers = ['Name', 'Description', 'Number of nodes', 'number of relations'];

        $fields = [
            'name' => $graph->name,
            'Description' => $graph->description,
            'nodes' => $graph->nodes->count(),
            'relations' => $graph->relations->count()
        ];

        $this->table($headers, [$fields]);
        return 0;
    }

}
