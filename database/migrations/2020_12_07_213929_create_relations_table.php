<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations', function (Blueprint $table) {
            $table->bigInteger('parent_node_id')->unsigned();
            $table->foreign('parent_node_id')
                ->references('id')->on('nodes')
                ->onDelete('cascade');
                
            $table->bigInteger('child_node_id')->unsigned();
            $table->foreign('child_node_id')
                ->references('id')->on('nodes')
                ->onDelete('cascade');

            $table->bigInteger('graph_id')->unsigned();
            $table->foreign('graph_id')
                ->references('id')->on('graphs')
                ->onDelete('cascade');

            $table->primary(array('parent_node_id','child_node_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relations');
    }
}
