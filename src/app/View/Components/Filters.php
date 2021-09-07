<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\Category;
use Illuminate\View\Component;

class Filters extends Component
{
    public function render()
    {
        return view('components.filters', [
            'categories' => Category::all(),
            'users' => User::all(),
            'currentCategory' => Category::firstWhere('slug', request('category')),
            // 'currentAuthor' => User::firstWhere('username', request('author')),
        ]);
    }
}
