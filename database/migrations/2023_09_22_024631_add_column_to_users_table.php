<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'is_verify')) {
                    $table->boolean('is_verify');
                }
                if (!Schema::hasColumn('users', 'verification_code')) {
                    $table->string('verification_code');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumn('users', 'is_verify')) {
                    $table->dropColumn('is_verify');
                }
                if (Schema::hasColumn('users', 'verification_code')) {
                    $table->dropColumn('verification_code');
                }
            });
        }
    }
}
