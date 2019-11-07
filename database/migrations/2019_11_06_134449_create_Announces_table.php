<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnouncesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Announces', function(Blueprint $table)
		{
			$table->integer('idAnnounce', true);
			$table->string('announce_name', 45);
			$table->string('announce_status', 45);
			$table->float('announce_prix', 10, 0);
			$table->text('announce_comment');
			$table->string('announce_adresse', 45);
			$table->dateTime('announce_date');
			$table->string('announce_img', 45)->nullable();
			$table->integer('products_idProduct')->index('fk_Announces_products1_idx');
			$table->integer('Users_idUser')->index('fk_Announces_Users1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Announces');
	}

}