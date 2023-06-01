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
        Schema::create('employee_informations', function (Blueprint $table) {
            $table->id();

            //file
            $table->string('profile_picture');

            //Need to change to connect with user address
            $table->string('employee_name');
            $table->string('email_address');

            //
            $table->varchar('contact_number');
            $table->string('address2');
            $table->string('address1');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('civil_status');
            $table->string('nationality');
            $table->string('position');

            $table->string('tin');
            $table->string('sss_num');
            $table->string('pagibig_num');
            $table->string('philhealth_num');

            $table->string('nbi_clearance');
            $table->string('gov_id1');
            $table->string('gov_id2');
            $table->string('emergency_name');
            $table->varchar('emergency_contactnum');
            $table->string('emergency_relationship');

            $table->string('file_cv')->nullable();
            $table->string('file_tor')->nullable();
            $table->string('file_contract')->nullable();
            $table->string('file_pledge')->nullable();
            $table->string('file_certificate_of_former_employer')->nullable();
            $table->string('img_sketch_of_residence')->nullable();
            $table->string('file_laptop_agreement')->nullable();
            $table->string('file_memo')->nullable();
            $table->string('notice_to_explain')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_information');
    }
};
