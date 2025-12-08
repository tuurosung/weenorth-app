<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class UpdateMembershipTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-membership-table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating members table ...');


        // check if table exists
        if (!Schema::hasTable('members')) {
            $this->error('Members table does not exist!');
            return;
        }


        Schema::table('members', function ($table) {

            $columns = [
                'date_of_birth' => [
                    'type' => 'date',
                    'after' => 'age',
                    'nullable' => true
                ],
                'gender' => [
                    'type' => 'string',
                    'after' => 'date_of_birth',
                    'nullable' => true
                ],
            ];


            foreach ($columns as $columnName => $attributes) {

                if (!Schema::hasColumn('members', $columnName)) {

                    $columnDefinition = null;

                    if ($attributes['type'] === 'date') {
                        $columnDefinition = $table->date($columnName);
                    }

                    if ($attributes['type'] === 'string') {
                        $columnDefinition = $table->string($columnName);
                    }

                    if ($columnDefinition) {

                        if (isset($attributes['after'])) {
                            $columnDefinition->after($attributes['after']);
                        }

                        if (isset($attributes['nullable']) && $attributes['nullable'] === true) {
                            $columnDefinition->nullable();
                        }

                        $this->info("Adding column: {$columnName}");
                    }

                } else {

                }

            }

            $this->info('Members table updated successfully.');
        });
    }
}
