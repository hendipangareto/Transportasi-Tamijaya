<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->string('inbox_name');
            $table->string('inbox_email');
            $table->string('inbox_phone');
            $table->text('address')->nullable();
            $table->string('inbox_subject');
            $table->text('inbox_message');
            $table->text('inbox_reply')->nullable();
            $table->string('status')->default('SENT');
            $table->string('replied_by')->nullable();
            $table->string('is_read')->default('N');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inboxes');
    }
}
