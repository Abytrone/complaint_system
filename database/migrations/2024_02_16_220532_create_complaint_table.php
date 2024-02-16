<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('communication_mode', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('mode', 20);
        });

        Schema::create('district', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('region_id');
            $table->string('district', 50)->nullable();
        });

        Schema::create('ec_data', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('region_id')->nullable();
            $table->string('region_name', 50)->nullable();
            $table->integer('constituency_id')->nullable();
            $table->string('constituency_name', 50)->nullable();
            $table->integer('ea_id')->nullable();
            $table->string('ea_name', 52)->nullable();
            $table->integer('ps_id')->nullable();
            $table->string('ps_code', 50)->nullable();
            $table->string('ps_name', 78)->nullable();
            $table->integer('register')->nullable();
        });

        Schema::create('issue', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 10);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 20);
            $table->string('sex', 6);
            $table->string('mode', 20)->nullable();
            $table->string('source', 35);
            $table->longText('raw');
            $table->date('received_date');
            $table->string('states', 20);
            $table->integer('created_by')->nullable();
            $table->dateTime('created_date', 3);
        });

        Schema::create('issue_category', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('category', 40)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->string('description', 250)->nullable();
        });

        Schema::create('issue_category_field', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('category_id');
            $table->integer('field_id');
            $table->integer('display');
            $table->integer('created_by');
            $table->dateTime('created_date');
            $table->integer('modified_by');
            $table->dateTime('modified_date');
        });

        Schema::create('issue_comment', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('issue_id');
            $table->integer('user_id');
            $table->dateTime('date', 3)->default('CURRENT_TIMESTAMP(3)');
            $table->longText('comments')->nullable();
        });

        Schema::create('issue_doc', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('complaint_id');
            $table->string('name', 100);
            $table->string('filepath', 100);
        });

        Schema::create('issue_esc', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('complaint_id');
            $table->integer('escalator');
            $table->string('prev', 100);
            $table->string('neaw', 100);
            $table->longText('reason');
            $table->dateTime('date', 3)->default('CURRENT_TIMESTAMP(3)');
        });

        Schema::create('issue_field', function (Blueprint $table) {
            $table->integer('field_id', true);
            $table->string('field_name', 50);
        });

        Schema::create('issue_gbv', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100);
            $table->tinyInteger('active')->default(1);
        });

        Schema::create('issue_issue', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('latlng', 80);
            $table->string('town', 50)->nullable();
            $table->string('addrex', 250);
            $table->integer('region_id');
            $table->integer('district_id')->nullable();
            $table->tinyInteger('editable');
            $table->tinyInteger('gbv');
            $table->integer('gbv_type');
            $table->integer('contituency_id');
            $table->integer('electoral_area_id');
            $table->integer('polling_station_id');
        });

        Schema::create('issue_master', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 10);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 20);
            $table->string('sex', 6);
            $table->string('mode', 20)->nullable();
            $table->string('source', 35)->nullable();
            $table->longText('raw');
            $table->date('received_date')->nullable();
            $table->string('states', 20)->nullable();
            $table->integer('created_by')->nullable();
            $table->dateTime('created_date', 3);
            $table->dateTime('updated_at')->nullable();
            $table->string('latlng', 80)->nullable();
            $table->string('town', 50)->nullable();
            $table->string('addrex', 250)->nullable();
            $table->integer('region_id');
            $table->integer('mmda_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->tinyInteger('editable')->nullable();
            $table->tinyInteger('gbv')->nullable();
            $table->integer('gbv_type')->nullable();
            $table->integer('contituency_id')->nullable();
            $table->integer('electoral_area_id')->nullable();
            $table->integer('polling_station_id')->nullable();
        });

        Schema::create('issue_process', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('processed_by')->nullable();
            $table->dateTime('processed_at', 3)->nullable();
            $table->longText('processed_message')->nullable();
            $table->string('issue_type', 10)->default('Complaint');
            $table->string('priority', 35)->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('category_id');
            $table->longText('comments')->nullable();
            $table->integer('created_by');
            $table->dateTime('created_date', 3)->default('CURRENT_TIMESTAMP(3)');
            $table->integer('updated_by')->nullable();
            $table->dateTime('upated_date', 3)->nullable();
        });

        Schema::create('issue_resolution', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('complaint_id');
            $table->integer('resolver_id');
            $table->longText('resolution')->nullable();
            $table->date('resolved_date')->nullable();
            $table->tinyInteger('confirmed_closed')->default(0);
            $table->date('confirmed_date')->nullable();
            $table->tinyInteger('reopened')->default(0);
            $table->string('reopen_by', 100)->nullable();
            $table->date('reopen_date')->nullable();
            $table->longText('reopen_reason')->nullable();
            $table->integer('create_by');
            $table->dateTime('create_date', 3)->default('CURRENT_TIMESTAMP(3)');
            $table->integer('upated_by')->nullable();
            $table->dateTime('upated_date', 3)->nullable();
        });

        Schema::create('issue_source', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('source', 50);
        });

        Schema::create('issue_status', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 20);
            $table->string('description', 500);
            $table->string('sms_msg', 160);
            $table->string('email_msg', 1200);
        });

        Schema::create('issue_subcategory', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('category_id');
            $table->string('description', 100);
            $table->boolean('active');
        });

        Schema::create('issue_support_group_role', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('group_id');
            $table->integer('role_id');
        });

        Schema::create('issue_support_group_user', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('group_id');
            $table->integer('user_id');
        });

        Schema::create('region', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('region', 100)->nullable();
        });

        DB::statement("CREATE VIEW `vw_com_search_parameters` AS select cast(now(3) as date) AS `rec_from`,cast(now(3) as date) AS `rec_to`,cast(now(3) as date) AS `pro_from`,cast(now(3) as date) AS `pro_to`,'' AS `phone`,'' AS `email`,'' AS `state`,0 AS `section_id`,0 AS `contract_id`,0 AS `area_id`,0 AS `group_id`,'' AS `source`,'' AS `priority`");

        DB::statement("CREATE VIEW `vw_district` AS select `complaint`.`region`.`region` AS `region`,`complaint`.`district`.`id` AS `id`,`complaint`.`district`.`region_id` AS `region_fk`,`complaint`.`district`.`district` AS `District` from (`complaint`.`district` join `complaint`.`region` on((`complaint`.`district`.`region_id` = `complaint`.`region`.`id`)))");

        DB::statement("CREATE VIEW `vw_ec_data_constituency` AS select `complaint`.`ec_data`.`region_id` AS `region_id`,`complaint`.`ec_data`.`region_name` AS `region_name`,`complaint`.`ec_data`.`constituency_id` AS `constituency_id`,`complaint`.`ec_data`.`constituency_name` AS `constituency_name` from `complaint`.`ec_data` group by `complaint`.`ec_data`.`region_id`,`complaint`.`ec_data`.`region_name`,`complaint`.`ec_data`.`constituency_id`,`complaint`.`ec_data`.`constituency_name`");

        DB::statement("CREATE VIEW `vw_ec_data_electoral_area` AS select `complaint`.`ec_data`.`region_id` AS `region_id`,`complaint`.`ec_data`.`region_name` AS `region_name`,`complaint`.`ec_data`.`constituency_id` AS `constituency_id`,`complaint`.`ec_data`.`constituency_name` AS `constituency_name`,`complaint`.`ec_data`.`ea_id` AS `ea_id`,`complaint`.`ec_data`.`ea_name` AS `ea_name` from `complaint`.`ec_data` group by `complaint`.`ec_data`.`region_id`,`complaint`.`ec_data`.`region_name`,`complaint`.`ec_data`.`constituency_id`,`complaint`.`ec_data`.`constituency_name`,`complaint`.`ec_data`.`ea_id`,`complaint`.`ec_data`.`ea_name`");

        DB::statement("CREATE VIEW `vw_issue_category_field` AS select `complaint`.`issue_field`.`field_name` AS `field_name`,`complaint`.`issue_category`.`category` AS `category`,`complaint`.`issue_category`.`description` AS `description`,`complaint`.`issue_category_field`.`id` AS `id`,`complaint`.`issue_category_field`.`category_id` AS `category_id`,`complaint`.`issue_category_field`.`field_id` AS `field_id`,`complaint`.`issue_category_field`.`display` AS `display`,`complaint`.`issue_category_field`.`created_by` AS `created_by`,`complaint`.`issue_category_field`.`created_date` AS `created_date`,`complaint`.`issue_category_field`.`modified_by` AS `modified_by`,`complaint`.`issue_category_field`.`modified_date` AS `modified_date` from ((`complaint`.`issue_category_field` join `complaint`.`issue_field` on((`complaint`.`issue_category_field`.`field_id` = `complaint`.`issue_field`.`field_id`))) join `complaint`.`issue_category` on((`complaint`.`issue_category_field`.`category_id` = `complaint`.`issue_category`.`id`)))");

        DB::statement("CREATE VIEW `vw_issue_subcategory` AS select `complaint`.`issue_category`.`category` AS `category`,`complaint`.`issue_subcategory`.`id` AS `id`,`complaint`.`issue_subcategory`.`category_id` AS `category_id`,`complaint`.`issue_subcategory`.`description` AS `description`,`complaint`.`issue_subcategory`.`active` AS `active` from (`complaint`.`issue_category` join `complaint`.`issue_subcategory` on((`complaint`.`issue_category`.`id` = `complaint`.`issue_subcategory`.`category_id`)))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `vw_issue_subcategory`");

        DB::statement("DROP VIEW IF EXISTS `vw_issue_category_field`");

        DB::statement("DROP VIEW IF EXISTS `vw_ec_data_electoral_area`");

        DB::statement("DROP VIEW IF EXISTS `vw_ec_data_constituency`");

        DB::statement("DROP VIEW IF EXISTS `vw_district`");

        DB::statement("DROP VIEW IF EXISTS `vw_com_search_parameters`");

        Schema::dropIfExists('region');

        Schema::dropIfExists('issue_support_group_user');

        Schema::dropIfExists('issue_support_group_role');

        Schema::dropIfExists('issue_subcategory');

        Schema::dropIfExists('issue_status');

        Schema::dropIfExists('issue_source');

        Schema::dropIfExists('issue_resolution');

        Schema::dropIfExists('issue_process');

        Schema::dropIfExists('issue_master');

        Schema::dropIfExists('issue_issue');

        Schema::dropIfExists('issue_gbv');

        Schema::dropIfExists('issue_field');

        Schema::dropIfExists('issue_esc');

        Schema::dropIfExists('issue_doc');

        Schema::dropIfExists('issue_comment');

        Schema::dropIfExists('issue_category_field');

        Schema::dropIfExists('issue_category');

        Schema::dropIfExists('issue');

        Schema::dropIfExists('ec_data');

        Schema::dropIfExists('district');

        Schema::dropIfExists('communication_mode');
    }
};
