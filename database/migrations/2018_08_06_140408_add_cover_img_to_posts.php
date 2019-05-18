<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoverImgToPosts extends Migration
{

    public function up()
    {
        Schema::table('posts', function($table){
            $table->String('cover_image');
        });
    }


    public function down()
    {
        Schema::table('posts', function($table){
            $table->dropColumn('cover_image');
        });
    }


}


