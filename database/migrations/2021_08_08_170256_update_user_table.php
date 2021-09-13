<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->default(0)->comment('1: mentor, 0: student, 2: other');
            $table->string('phone')->nullable();
            $table->date('brithday')->nullable();
            $table->string('address')->nullable();
            $table->text('about')->nullable();
            $table->string('img_user')->nullable();
            $table->integer('gender')->default(0)->comment("0: female, 1: male; 2: other");
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role')->on('users');
            $table->dropColumn('phone');
            $table->dropColumn('brithday');
            $table->dropColumn('address');
            $table->dropColumn('about');
            $table->dropColumn('img_user');
            $table->dropColumn('gender');
            $table->dropSoftDeletes();
        });
    }
}
