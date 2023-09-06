<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('journal_number')->unique();
            $table->date('journal_date')->nullable();
            $table->string('journal_description')->nullable();              
            $table->double('journal_debit')->nullable();       
            $table->double('journal_kredit')->nullable();   
            $table->double('journal_balance')->nullable();   
            $table->integer('status')->default(2);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
