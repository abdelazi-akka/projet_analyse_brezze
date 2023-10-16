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
id_operation	
id_client	
id_analyse	
resultat	
date_operation	
date_resultat	
etat */
        Schema::create('client_analyse', function (Blueprint $table) {
            $table->id("id_operation");
            $table->unsignedBigInteger("id_client");
            $table->unsignedBigInteger("id_analyse");
            $table->foreign("id_client")->references("id_client")->on("clients")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("id_analyse")->references("id_analyse")->on("analyses")->onDelete("cascade")->onUpdate("cascade");
            $table->string("resultat");
            $table->date("date_operation");
            $table->date("date_resultat");
            $table->integer('etat')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_analyse');
    }
};
