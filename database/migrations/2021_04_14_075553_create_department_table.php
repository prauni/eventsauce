<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
			$table->string('dept_name');
            $table->timestamps();
        });

		// Insert some department
		DB::table('departments')->insert(
			array(
				array('dept_name' => 'Accounts'),
				array('dept_name' => 'Shipping'),
				array('dept_name' => 'Transport'),
				array('dept_name' => 'Security')
			)
		);		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
