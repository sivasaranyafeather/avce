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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->unique();
            $table->string('name');
            $table->date('date');
            $table->string('admission_type');
            $table->string('department');
            $table->string('admission_reg')->nullable();
            $table->string('status');
            $table->string('email')->unique();
            $table->string('father_name');
            $table->string('father_occupation')->nullable();
            $table->string('mother_name');
            $table->string('mother_occupation')->nullable();
            $table->decimal('annual_income', 10, 2)->nullable();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('contact_number');
            $table->string('alternative_number')->nullable();
            $table->string('community');
            $table->string('com_others')->nullable();
            $table->string('house_no')->nullable();
            $table->string('street_name')->nullable();
            $table->string('place');
            $table->string('pincode');
            $table->string('marks')->nullable();
            $table->string('study')->nullable();
            $table->string('school_polytechnic')->nullable();
            $table->integer('maths')->nullable();
            $table->integer('physics')->nullable();
            $table->integer('chemistry')->nullable();
            $table->decimal('hsc_percentage',5, 2)->nullable();
            $table->integer('v_sem')->nullable();
            $table->integer('vi_sem')->nullable();
            $table->integer('total')->nullable();
            $table->decimal('percentage', 5, 2)->nullable();
            $table->string('referred_by')->nullable();
            $table->string('ref_name')->nullable();
            $table->string('con_number')->nullable();
            $table->string('staff_name')->nullable();
            $table->string('staff_number')->nullable();
            $table->string('transport')->nullable();
            $table->string('fg')->nullable();
            $table->string('Sc_st');
            $table->string('bc');
            $table->string('mbc');
            $table->string('oc');
            $table->integer('user_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
