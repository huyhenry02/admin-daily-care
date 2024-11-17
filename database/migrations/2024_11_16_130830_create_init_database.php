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
        // Cleaners table
        Schema::create('cleaners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->float('rating')->default(0);
            $table->integer('point')->default(0);
            $table->integer('account_balance')->default(0);
            $table->text('cv')->nullable();
            $table->string('cv_file', 255)->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->boolean('can_cleaning')->default(false);
            $table->boolean('can_market')->default(false);
            $table->timestamps();
        });

        // Contracts table
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cleaner_id')->constrained('cleaners');
            $table->string('name', 255);
            $table->date('start_date');
            $table->date('end_date');
            $table->text('terms')->nullable();
            $table->integer('commission')->default(0);
            $table->string('attachment_file')->nullable();
            $table->enum('status', ['inactive', 'active']);
            $table->timestamps();
        });

        // Orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users');
            $table->foreignId('cleaner_id')->nullable()->constrained('cleaners');
            $table->enum('service_type', ['market', 'clean']);
            $table->enum('status', ['pending', 'going', 'processing', 'completed', 'complaining']);
            $table->enum('pay_status', ['pending', 'deposited', 'paid', 'return_amount']);
            $table->text('feedback')->nullable();
            $table->integer('rating')->nullable();
            $table->foreignId('old_order_id')->nullable()->constrained('orders');
            $table->date('feedback_date')->nullable();
            $table->integer('number_of_repetition')->default(0);
            $table->boolean('is_required')->default(false);
            $table->boolean('has_tool')->default(false);
            $table->string('has_animals', 255)->nullable();
            $table->timestamps();
        });

        // Service Cleaning Hour table
        Schema::create('service_cleaning_hour', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('hour');
            $table->integer('price');
            $table->timestamps();
        });

        // Cleaning Order table
        Schema::create('cleaning_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->string('name_customer', 255);
            $table->string('phone_customer', 255);
            $table->enum('home_type', ['apartment', 'villa', 'townhouse']);
            $table->string('address', 255);
            $table->integer('total_price');
            $table->integer('deposit')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'rejected']);
            $table->dateTime('start_time');
            $table->foreignId('service_cleaning_hour_id')->constrained('service_cleaning_hour');
            $table->text('note')->nullable();
            $table->boolean('is_cleaning_other')->default(false);
            $table->boolean('is_cook')->default(false);
            $table->timestamps();
        });

        // Market Order table
        Schema::create('market_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->string('from_name_customer', 255);
            $table->string('from_phone_customer', 255);
            $table->enum('from_home_type', ['apartment', 'villa', 'townhouse']);
            $table->string('from_address', 255);
            $table->string('to_name_customer', 255);
            $table->string('to_phone_customer', 255);
            $table->enum('to_home_type', ['apartment', 'villa', 'townhouse']);
            $table->string('to_address', 255);
            $table->integer('deposit_price');
            $table->integer('service_price');
            $table->integer('expect_price')->nullable();
            $table->integer('bought_price')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'rejected']);
            $table->dateTime('delivery_time');
            $table->text('note')->nullable();
            $table->timestamps();
        });

        // Market Order Details table
        Schema::create('market_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('market_order_id')->constrained('market_order');
            $table->string('name_product', 255);
            $table->timestamps();
        });

        // Order Applications table
        Schema::create('order_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('cleaner_id')->constrained('cleaners');
            $table->text('cv')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->timestamps();
        });

        // Complaints table
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('complaint_by_id')->constrained('users');
            $table->text('description')->nullable();
            $table->text('evidence')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->text('admin_decision')->nullable();
            $table->timestamps();
        });

        // revenue_systems table
        Schema::create('revenue_systems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->integer('revenue_percent');
            $table->integer('revenue_amount');
            $table->timestamps();
        });

        // Payments table
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->integer('amount');
            $table->enum('payment_method', ['cash', 'card', 'bank_transfer']);
            $table->enum('status', ['not_paid', 'paid']);
            $table->timestamps();
        });

        // Advertisements table
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->enum('type', ['news', 'banner']);
            $table->timestamps();
        });

        // Notifications table
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users');
            $table->foreignId('receiver_id')->constrained('users');
            $table->string('type', 255)->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('advertisements');
        Schema::dropIfExists('revenue_systems');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('complaints');
        Schema::dropIfExists('order_applications');
        Schema::dropIfExists('market_order_details');
        Schema::dropIfExists('market_order');
        Schema::dropIfExists('cleaning_order');
        Schema::dropIfExists('service_cleaning_hour');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('cleaners');
    }
};
