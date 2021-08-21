<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class Hack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lattswal:hack';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For a quick hack and test';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        $this->assignAdminRoles();
    }

    private function assignAdminRoles(): void
    {
        $god_role = Role::where('name', 'LIKE', 'god')->first();
        $god = User::find(1);
        $god->assignRole($god_role);

        $admin_role = Role::where('name', 'LIKE', 'admin')->first();
        $admin = User::find(2);
        $admin->assignRole($admin_role);

        $this->info('God and admin roles assigned successfully.');
    }
}
