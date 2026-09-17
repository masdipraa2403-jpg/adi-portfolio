<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('educations',function(Blueprint $t){$t->id();$t->string('institution');$t->string('major')->nullable();$t->string('start_year',10)->nullable();$t->string('end_year',10)->nullable();$t->text('description')->nullable();$t->string('logo')->nullable();$t->boolean('is_active')->default(true);$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});
  Schema::create('work_experiences',function(Blueprint $t){$t->id();$t->string('company');$t->string('position');$t->string('location')->nullable();$t->string('start_date')->nullable();$t->string('end_date')->nullable();$t->text('description')->nullable();$t->string('logo')->nullable();$t->boolean('is_active')->default(true);$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});
  Schema::create('organizations',function(Blueprint $t){$t->id();$t->string('name');$t->string('position')->nullable();$t->string('period')->nullable();$t->string('location')->nullable();$t->text('description')->nullable();$t->text('achievement')->nullable();$t->string('logo')->nullable();$t->boolean('is_active')->default(true);$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});
  Schema::create('skills',function(Blueprint $t){$t->id();$t->string('name');$t->string('category')->nullable();$t->string('icon')->nullable();$t->unsignedTinyInteger('level')->nullable();$t->boolean('is_active')->default(true);$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});
  Schema::create('certificates',function(Blueprint $t){$t->id();$t->string('name');$t->string('issuer')->nullable();$t->string('issued_at')->nullable();$t->string('credential_id')->nullable();$t->string('credential_url')->nullable();$t->string('image')->nullable();$t->string('file')->nullable();$t->text('description')->nullable();$t->boolean('is_active')->default(true);$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});
  Schema::create('technologies',function(Blueprint $t){$t->id();$t->string('name');$t->string('icon')->nullable();$t->timestamps();});
  Schema::create('projects',function(Blueprint $t){$t->id();$t->string('name');$t->string('slug')->unique();$t->string('category')->nullable();$t->string('thumbnail')->nullable();$t->string('short_description')->nullable();$t->longText('description')->nullable();$t->string('year')->nullable();$t->string('github_url')->nullable();$t->string('demo_url')->nullable();$t->enum('status',['draft','published'])->default('draft');$t->boolean('is_featured')->default(false);$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});
  Schema::create('project_images',function(Blueprint $t){$t->id();$t->foreignId('project_id')->constrained()->cascadeOnDelete();$t->string('path');$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});
  Schema::create('project_technology',function(Blueprint $t){$t->foreignId('project_id')->constrained()->cascadeOnDelete();$t->foreignId('technology_id')->constrained()->cascadeOnDelete();$t->primary(['project_id','technology_id']);});
  Schema::create('contact_messages',function(Blueprint $t){$t->id();$t->string('name');$t->string('email');$t->string('subject');$t->longText('message');$t->boolean('is_read')->default(false);$t->timestamps();});
  Schema::create('social_links',function(Blueprint $t){$t->id();$t->string('platform');$t->string('url');$t->string('icon')->nullable();$t->boolean('is_active')->default(true);$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});
  Schema::create('settings',function(Blueprint $t){$t->id();$t->string('key')->unique();$t->text('value')->nullable();$t->timestamps();});
 }
 public function down(): void { foreach(['project_technology','project_images','projects','technologies','certificates','skills','organizations','work_experiences','educations','contact_messages','social_links','settings'] as $t) Schema::dropIfExists($t); }
};
