<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {/*
	
designation	
prix	
abrv	
unite	
norme	
date_ajouter */
        Schema::create('analyses', function (Blueprint $table) {
            $table->id("id_analyse");
            $table->string("designation");
            $table->float("prix");
            $table->string("abrv");
            $table->string("unite");
            $table->string("norme");
            $table->date("date_ajouter");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyses');
    }
};
