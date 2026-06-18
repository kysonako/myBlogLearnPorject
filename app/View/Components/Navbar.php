<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;


class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $user;
    public $menuItems;

    public function __construct()
    {
        //
        $this->user = Auth::user();
        $this->menuItems = [
            ['label' => 'Главная', 'route'=> 'home','icon'=>'fa-home'],
            ['label' => 'Блог', 'route'=> 'posts.index','icon'=>'fa-blog'],

        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
