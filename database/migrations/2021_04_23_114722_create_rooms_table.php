<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'rooms',
            function (Blueprint $table) {
                $table->uuid('id')
                    ->unique()
                    ->primary();
                
                $table->json('name');
                $table->string('color');
                $table->boolean('is_sale');
                
                $table->string('path');
                
                $table->unsignedBigInteger('number_room');
                $table->string('coordinate');
                
                $table->uuid('plan_id');
                
                $table->timestamps();
                
                $table->foreign('plan_id')
                    ->on('plans')
                    ->references('id')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            }
        );
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
    
}
