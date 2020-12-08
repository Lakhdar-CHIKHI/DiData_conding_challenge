<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Graph;

class ClearEmptyGraphs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command should delete all empty graphs.';

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
        $graphs = Graph::all();
        foreach ($graphs as $graph) {
            if ($graph->nodes->isEmpty()) {
                $graph->delete();
            }
        }
        return 0;
    }
}
