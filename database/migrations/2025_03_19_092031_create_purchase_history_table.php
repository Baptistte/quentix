<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('purchase_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->timestamp('purchase_date')->useCurrent();
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->string('plan_name');
            $table->string('plan_id');
            
        });
    }

    public function down(): void {
        Schema::dropIfExists('purchase_history');
    }
};