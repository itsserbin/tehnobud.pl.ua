<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentationsTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'presentations',
            function (Blueprint $table) {
                $table->uuid('id')
                    ->primary()
                    ->unique();
                
                $table->string('path_pdf');
                
                $table->string('path');
                
                $table->uuid('building_id');
                
                $table->timestamps();
                
                $table->foreign('building_id')
                    ->on('buildings')
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
        Schema::dropIfExists('presentations');
    }
    
}
