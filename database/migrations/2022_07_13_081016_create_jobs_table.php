<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('company_id')->constrained();
            $table->foreignId('industry_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->string('title');
            $table->string('country');
            $table->tinyInteger('vacancies');
            $table->string('employment');
            $table->longText('description');
            $table->longText('requirements');
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
        Schema::dropIfExists('jobs');
    }
};
