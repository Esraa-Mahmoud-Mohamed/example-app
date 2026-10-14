<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

#[Signature('app:generate-permissions')]
#[Description('Generate CRUD permissions')]
class GeneratePermissions extends Command
{
    /**
     * Execute the console command.
     */

    protected $signature = 'permissions:generate';

    protected $description = 'Generate CRUD permissions';

    public function handle()
    {
        $resources = [
            'company-setting',
        ];

        $actions = [
            'view',
            // 'create',
            'edit',
            'reset',
            // 'delete',
        ];

        foreach ($resources as $resource) {

            foreach ($actions as $action) {

                Permission::firstOrCreate([
                    'name' => "{$action} {$resource}"
                ]);

                $this->info("Created {$action} {$resource}");
            }
        }

        $this->info('Done!');
    }
}
