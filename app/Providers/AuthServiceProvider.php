<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Expense;
use App\Models\ExpenseSubtype;
use App\Models\ExpenseType;
use App\Policies\ExpensePolicy;
use App\Policies\ExpenseSubtypePolicy;
use App\Policies\ExpenseTypePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        ExpenseType::class => ExpenseTypePolicy::class,
        ExpenseSubtype::class => ExpenseSubtypePolicy::class,
        Expense::class => ExpensePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
