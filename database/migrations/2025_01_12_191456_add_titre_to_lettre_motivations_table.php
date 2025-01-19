<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('lettre_motivations', function (Blueprint $table) {
            $table->string('titre')->after('user_id'); // Ajouter la colonne titre
        });
    }
    
    public function down()
    {
        Schema::table('lettre_motivations', function (Blueprint $table) {
            $table->dropColumn('titre'); // Supprimer la colonne titre si la migration est annulée
        });
    }
};
