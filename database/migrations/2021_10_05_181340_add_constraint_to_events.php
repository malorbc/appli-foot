<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintToEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            //relier la clef du club à l'event, car 1 event est assigné à 1 club
            $table->unsignedBigInteger('club_id')->default(1);
            $table->foreign('club_id')->references('id')->on('clubs');

            $table->unsignedBigInteger('categorie_id')->default(1);
            $table->foreign('categorie_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
}
