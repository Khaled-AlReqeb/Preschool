<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('profile_image')->default('/uploads/placeholder/user_avatar.png');
            $table->string('password');
            $table->boolean('is_admin')->default(0);
            $table->unsignedBigInteger('country_id');
            $table->string('mobile');
            $table->unsignedBigInteger('phone_code_id');
            $table->unsignedBigInteger('currency_id')->default(1);
            $table->enum('main_language', ['ar', 'en'])->default('ar');
            $table->unsignedBigInteger('role_id')->default(1);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('time_zone')->nullable();
            $table->rememberToken();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('cascade');

            $table->foreign('currency_id')
                ->references('id')->on('currencies')
                ->onDelete('cascade');

            $table->foreign('phone_code_id')
                ->references('id')->on('country_phone_codes')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
