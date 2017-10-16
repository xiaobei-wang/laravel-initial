<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from', 255)->default("")->comment('发送者');
            $table->string('title', 20)->default("")->comment('标题');
            $table->text('content')->comment('内容');
            $table->string('link', 255)->default("")->comment('链接');
            $table->tinyInteger('status')->default("0")->comment('状态 1-已读；2-未读');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_task');
    }
}
