<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DBMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create_tables

        // 事業所マスタ
        Schema::create('offices', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->integer('office_no')->comment('事業所コード');
            $table->string('office_name')->comment('事業所名');
            $table->integer('delete_flg')->comment('削除フラグ')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        // 品種マスタ
        Schema::create('flower_kinds', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->integer('kind_code')->comment('品種コード');
            $table->string('kind_name')->comment('品種名');
            $table->integer('office_no')->comment('事業所NO');
            $table->integer('kind_sort_key')->comment('ソートキー');
            $table->integer('delete_flg')->comment('削除フラグ')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->unique('kind_code');
            $table->index('office_no');
        });

        // 担当者マスタ
        Schema::create('charge_persons', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->integer('charge_person_no')->comment('担当者コード');
            $table->string('charge_person_name')->comment('担当者名');
            $table->integer('office_no')->comment('担当事業所');
            $table->string('password')->comment('パスワード');
            $table->integer('delete_flg')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        // 市場マスタ
        Schema::create('markets', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->integer('market_no')->comment('市場コード');
            $table->string('market_name')->comment('市場名');
            $table->float('amount', 8, 2)->comment('手数料％');
            $table->integer('communication_cost')->comment('通信費');
            $table->integer('post_no')->comment('郵便番号')->nullable();
            $table->string('adress')->comment('住所')->nullable();
            $table->string('tel', '15')->comment('電話番号')->nullable();
            $table->string('fax', '15')->comment('FAX番号')->nullable();
            $table->integer('delete_flg')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        // 箱マスタ
        Schema::create('boxes', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->integer('box_no')->comment('箱コード');
            $table->string('box_name')->comment('箱名');
            $table->integer('size')->comment('寸法（以下）')->nullable();
            $table->integer('box_cost')->comment('箱代');
            $table->string('summary')->comment('摘要')->nullable();
            $table->string('classification')->comment('区分');
            $table->integer('delete_flg')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        // 生産数入力
        Schema::create('number_of_productions',function(Blueprint $table){
            $table->increments('id')->autoIncrement();
            $table->integer('office_no')->comment('事業所別');
            $table->integer('flower_kind_id')->default(0)->comment('品種ID');
            $table->string('grade')->comment('等級');
            $table->string('flower_number')->comment('入本数');
            $table->integer('box_number')->comment('箱数');
            $table->string('summary')->comment('摘要');
            $table->integer('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->index('office_no');
        });

        // 送料テーブル
        Schema::create('postages',function(Blueprint $table){
            $table->increments('id')->autoIncrement();
            $table->integer('market_id')->comment('市場ID');
            $table->integer('box_id')->comment('箱ID');
            $table->integer('postage')->default(0)->comment('送料');
            $table->integer('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('flower_kinds');
    }
}
