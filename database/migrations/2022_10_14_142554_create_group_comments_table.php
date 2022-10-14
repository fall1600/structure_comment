<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

class CreateGroupCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('group_id')->nullable();
            $table->unsignedInteger('comment_id')->nullable();
            $table->text('text')->nullable();
            $table->string('feed_id')->nullable();
            NestedSet::columns($table);
            $table->timestamps();

            $table->index(['group_id']);
            $table->index(['comment_id']);
            $table->index(['feed_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_comments');
    }
}
