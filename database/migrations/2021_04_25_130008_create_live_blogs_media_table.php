<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveBlogsMediaTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'live_blogs_medias',
            function (Blueprint $table) {
                $table
                    ->uuid('id')
                    ->primary()
                    ->unique();
                
                $table->string('path');
    
                $table->uuid('live_blog_id');
    
                $table->timestamps();
    
                $table->foreign('live_blog_id')
                    ->on('live_blogs')
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
        Schema::dropIfExists('live_blogs_medias');
    }
    
}
