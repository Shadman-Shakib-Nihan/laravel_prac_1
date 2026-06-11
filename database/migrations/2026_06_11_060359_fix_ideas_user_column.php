<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('ideas', 'user_id') && Schema::hasColumn('ideas', 'User')) {
            Schema::create('ideas_fix_temp', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->text('description');
                $table->string('state');
                $table->timestamps();
            });

            DB::table('ideas_fix_temp')->insertUsing(
                ['id', 'user_id', 'description', 'state', 'created_at', 'updated_at'],
                DB::table('ideas')->select('id', DB::raw('"User" as user_id'), 'description', 'state', 'created_at', 'updated_at')
            );

            Schema::drop('ideas');
            Schema::rename('ideas_fix_temp', 'ideas');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('ideas', 'user_id')) {
            Schema::create('ideas_fix_temp', function (Blueprint $table) {
                $table->id();
                $table->integer('User');
                $table->text('description');
                $table->string('state');
                $table->timestamps();
            });

            DB::table('ideas_fix_temp')->insertUsing(
                ['id', 'User', 'description', 'state', 'created_at', 'updated_at'],
                DB::table('ideas')->select('id', 'user_id as User', 'description', 'state', 'created_at', 'updated_at')
            );

            Schema::drop('ideas');
            Schema::rename('ideas_fix_temp', 'ideas');
        }
    }
};
