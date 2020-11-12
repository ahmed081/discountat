<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceTable extends Migration
{
/* 

    php artisan migrate --path='./database/migrations/2020_10_22_145108_create_device_table.php'
    php artisan migrate --path='./database/migrations/2020_10_22_145048_create_type_table.php'
    php artisan migrate --path='./database/migrations/2014_10_12_000000_create_users_table.php'
    php artisan migrate --path='./database/migrations/2020_10_23_151851_create_login_table.php'
    php artisan migrate --path='./database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php'
    php artisan migrate --path='./database/migrations/2020_10_22_145146_create_categories_table.php'
    php artisan migrate --path='./database/migrations/2020_10_22_145127_create_brands_table.php'
    php artisan migrate --path='./database/migrations/2020_10_22_145210_create_ads_table.php'
    php artisan migrate --path='./database/migrations/2020_10_22_145251_create_ads_view_table.php'
    php artisan migrate --path='./database/migrations/2020_10_24_170730_create_banners_table.php'
    php artisan migrate --path='./database/migrations/2020_10_24_104308_create_ads_duration_table.php'
    php artisan migrate --path='./database/migrations/2020_11_03_164952_create_subscription_table.php' 
    php artisan migrate --path='./database/migrations/2020_11_11_131025_create_messages_table.php' 
    php artisan migrate --path='./database/migrations/2020_11_11_150046_create_messages_seen_by_table.php'
    php artisan migrate --path='./database/migrations/2020_11_11_150601_create_messages_categories_table.php'
    
    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device', function (Blueprint $table) {
            $table->increments("id")->unique();
            $table->string("name",20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device');
    }
}
