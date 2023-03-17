<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountNameToUsersTable extends Migration {

    private string $table = 'users';
    private string $accountName = 'account_name';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table($this->table, function (Blueprint $table) {
            $table->string($this->accountName)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn($this->accountName);
        });
    }

}
