<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('journal_details', function (Blueprint $table) {
            $table->id();
            $table->integer('id_journal');
            $table->integer('id_account')->default(0);
            $table->string('type_journal')->nullable();
            $table->double('journal_amount')->nullable();
            $table->string('journal_notes')->default('');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('journal_details');
    }
}
