<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'buildings',
            function (Blueprint $table) {
                $table->uuid('id')
                    ->primary()
                    ->unique();
                $table->integer('priority')
                    ->default(0);
                
                $table->json('name');
                $table->json('slug');
                
                /*info*/
                
                /* status*/
                
                $table->json('status');
                $table->string('status_color')
                    ->nullable();
                
                /* end Status */
                $table->json('address');
                $table->json('description');
                $table->json('coordinate')
                    ->nullable();
                /*end info*/
                
                $table->boolean('is_active');
                $table->double('price');
                
                //
                $table->integer("floors")
                    ->nullable();
                
                $table->float("total_area")
                    ->nullable();
                
                $table->json("heating")
                    ->nullable();
                
                $table->json("overlapping")
                    ->nullable();
                
                $table->json("material")
                    ->nullable();
                
                $table->json("view")
                    ->nullable();
                
                $table->boolean("parking")
                    ->default(false);
                
                //
                $table->json('additional_information');
                //
                $table->date('started_at')
                    ->nullable();
                
                $table->date('ended_at')
                    ->nullable();
                //
                
                $table
                    ->string('path')
                    ->nullable(true);
                
                $table->uuid('district_id');
                
                $table->timestamps();
                
                $table->foreign('district_id')
                    ->on('districts')
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
        Schema::dropIfExists('buildings');
    }
    
}
