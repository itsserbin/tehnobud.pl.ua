<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveBlogsTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'live_blogs',
            function (Blueprint $table) {
                $table
                    ->uuid('id')
                    ->primary()
                    ->unique();
                
                $table->json('name');
                $table->json('description');
                
                $table->json('videos');
                
                $table->date('published_at');
                
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
        Schema::dropIfExists('live_blogs');
    }
    
}
