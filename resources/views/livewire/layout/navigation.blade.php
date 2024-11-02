<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

@persist('nav')
    <nav class="navbar flex w-full gap-2 rounded-box shadow max-md:flex-col md:items-center">
        <div class="flex items-center justify-between max-md:w-full">
            <div class="navbar-start items-center justify-between max-md:w-full">
                <a class="link link-neutral text-xl font-semibold text-base-content/90 no-underline" href="#">
                    FlyonUI
                </a>
                <div class="md:hidden">
                    <button type="button" class="collapse-toggle btn btn-square btn-secondary btn-outline btn-sm"
                        data-collapse="#dropdown-navbar-collapse" aria-controls="dropdown-navbar-collapse"
                        aria-label="Toggle navigation">
                        <span class="size-4 icon-[tabler--menu-2] collapse-open:hidden"></span>
                        <span class="size-4 icon-[tabler--x] hidden collapse-open:block"></span>
                    </button>
                </div>
            </div>
        </div>
        <div id="dropdown-navbar-collapse"
            class="collapse hidden grow basis-full overflow-hidden transition-[height] duration-300 md:navbar-end max-md:w-full">
            <ul class="menu gap-2 p-0 text-base md:menu-horizontal">
                <li><a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a></li>
                <li><a href="{{ route('criteria.index') }}" wire:navigate>Criteria</a></li>
                <li class="dropdown relative inline-flex [--auto-close:inside] [--offset:9] [--placement:bottom-end]">
                    <button id="dropdown-nav" type="button"
                        class="dropdown-toggle dropdown-open:bg-base-content/10 dropdown-open:text-base-content"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        Employee
                        <span class="size-4 icon-[tabler--chevron-down] dropdown-open:rotate-180"></span>
                    </button>
                    <ul class="dropdown-menu hidden dropdown-open:opacity-100" role="menu" aria-orientation="vertical"
                        aria-labelledby="dropdown-nav">
                        <li><a class="dropdown-item" href="{{ route('employee.index') }}" wire:navigate>Data Employe</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('employee_score.index') }}" wire:navigate>Employee
                                Score</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('calculate.index') }}" wire:navigate>Calculate</a></li>
                <li><a href="{{ route('ranking.index') }}" wire:navigate>Ranking</a></li>
                <li><button wire:click="logout" class="bg-red-400 text-slate-200 hover:bg-red-500 md:hidden">Sign
                        Out</button>
                </li>
                <div
                    class="dropdown relative order-first my-3 inline-flex [--auto-close:inside] [--placement:bottom-end] [--offset:8] md:order-last md:my-0 md:inline-flex">
                    <button id="dropdown-scrollable" type="button" class="dropdown-toggle flex items-center"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <div class="avatar">
                            <div class="size-9.5 rounded-full">
                                <img src="{{ asset('images/default_user.jpeg') }}" alt="avatar 1" />
                            </div>
                        </div>
                    </button>
                    <div class="ml-3 flex flex-col md:hidden">
                        <h6 class="text-base font-semibold text-base-content/90">{{ Auth::user()->name }}</h6>
                        <small class="text-base-content/50">Admin</small>
                    </div>
                    <ul class="min-w-60 dropdown-menu hidden md:dropdown-open:opacity-100" role="menu"
                        aria-orientation="vertical" aria-labelledby="dropdown-avatar">
                        <li class="dropdown-header gap-2">
                            <div class="avatar">
                                <div class="w-10 rounded-full">
                                    <img src="{{ asset('images/default_user.jpeg') }}" alt="avatar" />
                                </div>
                            </div>
                            <div>
                                <h6 class="text-base font-semibold text-base-content/90">{{ Auth::user()->name }}</h6>
                                <small class="text-base-content/50">Admin</small>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}" class="dropdown-item" wire:navigate>
                                <span class="icon-[tabler--user]"></span>
                                My Profile
                            </a>
                        </li>
                        <li class="dropdown-footer gap-2">
                            <button class="btn btn-error btn-soft btn-block" wire:click="logout">
                                <span class="icon-[tabler--logout]"></span>
                                Sign out
                            </button>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </nav>
@endpersist
