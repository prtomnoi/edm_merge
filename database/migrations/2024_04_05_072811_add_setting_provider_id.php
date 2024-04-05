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
    {
        Schema::table('table_settings', function(Blueprint $table){
            $table->unsignedBigInteger('provider_id')->nullable()->comment('fk provider');
        });
        $this->insertDefault();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }

    public function insertDefault(): void
    {
        DB::table('table_settings')->insert([[
            'facebook' => '#',
            'youtube' => '#',
            'url' => '#',
            'contact' => '#',
            'provider_id' => 2
        ],
        [
            'facebook' => '#',
            'youtube' => '#',
            'url' => '#',
            'contact' => '#',
            'provider_id' => 3
        ]
        ]);
    }
};
