<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('cnpj')->unique();
            $table->string('name')->unique();
            $table->String('email')->unique();
            $table->string('logo')->nullable();

            // Status tenant(se inativar 'N' ele perde o acesso ao sistema)

            $table->enum('active',['Y', 'N'])->default('Y');

            //Subscription

            $table->date('subscription')->nullable(); // Data que se inscreveu
            $table->date('expires_at')->nullable(); // Data que expira o acesso
            $table->boolean('subscription_active')->default(false); // Assinatura Ativa
            $table->boolean('subscription_suspended')->default(false);
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
        Schema::dropIfExists('tenants');
    }
}
