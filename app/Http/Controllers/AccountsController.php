<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use DataTables;

class AccountsController extends Controller
{
    public function index()
    {
		$users = User::paginate(10);
		return Inertia::render('Accounts',[
			'users' => $users->items(),
            'paginator' => $users
        ]);			

    }
}