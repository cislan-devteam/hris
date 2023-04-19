<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('superAdmin', 'Super Admin', [
            'create',
            'read',
            'update',
            'delete',
        ])->description('Administrator users can perform any action.');

        Jetstream::role('hrAdmin', 'HR Admin', [
            'read',
            'create',
            'update',
            'delete'
        ])->description('HR Admin users can create, edit, delete, assign roles to emplyee users. Can also manage employee data and generate reports');

        Jetstream::role('itAdmin', 'IT Admin', [
            'read',
            'create',
            'update',
            'delete',
        ])->description('IT Admin users can create, edit, delete and manage user accounts for IT admin role. Can also manage system settings and configurations.');

         Jetstream::role('director', 'Director', [
            'read',
            'create',
            'update',
        ])->description('Director can view employee data, manage performance. This Role is allowed to generate reports and analytics.');

         Jetstream::role('client', 'Client', [
            'read',
            'create',


        ])->description('Clients can view employee data. Can also sumbit tickets and view its status.');

        Jetstream::role('employee', 'Employee', [
            'read',
            'update',

        ])->description('Can view and update personal information.');
    }
}
