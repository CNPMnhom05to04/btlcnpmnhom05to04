<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('messages')) {
            Schema::table('messages', function (Blueprint $table) {
                if (!Schema::hasColumn('messages', 'file1')) {
                    $table->boolean('file1');
                }
                if (!Schema::hasColumn('messages', 'file2')) {
                    $table->boolean('file2');
                }
                if (!Schema::hasColumn('messages', 'file3')) {
                    $table->boolean('file3');
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
        if (Schema::hasTable('messages')) {
            Schema::table('messages', function (Blueprint $table) {
                if (!Schema::hasColumn('messages', 'file1')) {
                    $table->boolean('file1');
                }
                if (!Schema::hasColumn('messages', 'file2')) {
                    $table->boolean('file2');
                }
                if (!Schema::hasColumn('messages', 'file3')) {
                    $table->boolean('file3');
                }
            });
        }
    }
}
