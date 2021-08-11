<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo_image')->default('/uploads/placeholder/icon.png');
            $table->string('header_image')->default('/uploads/placeholder/img-home2.png');
            $table->string('about_image')->default('/uploads/placeholder/lamp.png');
            $table->string('ar_name');
            $table->string('en_name');
            $table->binary('ar_header_title')->nullable();
            $table->binary('en_header_title')->nullable();
            $table->binary('ar_header_subTitle')->nullable();
            $table->binary('en_header_subTitle')->nullable();
            $table->binary('ar_about_title')->nullable();
            $table->binary('en_about_title')->nullable();
            $table->binary('ar_about_content')->nullable();
            $table->binary('en_about_content')->nullable();
            $table->binary('ar_activities_title')->nullable();
            $table->binary('en_activities_title')->nullable();
            $table->binary('ar_partner_title')->nullable();
            $table->binary('en_partner_title')->nullable();
            $table->binary('ar_contact_content')->nullable();
            $table->binary('en_contact_content')->nullable();
            $table->binary('ar_footer_content')->nullable();
            $table->binary('en_footer_content')->nullable();
            $table->binary('ar_terms')->nullable();
            $table->binary('en_terms')->nullable();
            $table->binary('ar_policy')->nullable();
            $table->binary('en_policy')->nullable();
            $table->binary('youtube_url')->nullable();
            $table->binary('app_url')->nullable();
            $table->string('ar_address')->nullable();
            $table->string('en_address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('telephone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('google')->nullable();
            $table->string('pannel_main_color')->nullable();
            $table->string('pannel_secondary_color')->nullable();
            $table->string('fast_access_color')->nullable();
            $table->enum('pannel_mood', ['dark', 'light'])->default('dark');
            $table->enum('pannel_type', ['multi_store', 'one_store'])->default('multi_store');
//            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();

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
        Schema::dropIfExists('general_settings');
    }
}
