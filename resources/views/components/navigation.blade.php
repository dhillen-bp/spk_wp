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

<nav class="navbar gap-4 rounded-box bg-base-100 shadow">
    <div class="navbar-start items-center">
        <a class="link link-neutral text-xl font-semibold text-base-content/90 no-underline" href="#">
            FlyonUI
        </a>
    </div>
    <div class="navbar-end flex items-center gap-4">
        <button class="size-[2.125rem] btn btn-circle btn-text btn-sm sm:hidden">
            <span class="size-[1.375rem] icon-[tabler--search]"></span>
        </button>
        <label class="max-w-56 input-group hidden rounded-full sm:flex">
            <span class="input-group-text">
                <span class="size-5 icon-[tabler--search] text-base-content/80"></span>
            </span>
            <input type="search" class="input grow rounded-e-full" placeholder="Search" />
        </label>
        <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
            <button id="dropdown-scrollable" type="button" class="dropdown-toggle flex items-center"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <div class="avatar">
                    <div class="size-9.5 rounded-full">
                        <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar 1" />
                    </div>
                </div>
            </button>
            <ul class="min-w-60 dropdown-menu hidden dropdown-open:opacity-100" role="menu"
                aria-orientation="vertical" aria-labelledby="dropdown-avatar">
                <li class="dropdown-header gap-2">
                    <div class="avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar" />
                        </div>
                    </div>
                    <div>
                        <h6 class="text-base font-semibold text-base-content/90">John Doe</h6>
                        <small class="text-base-content/50">Admin</small>
                    </div>
                </li>
                <li>
                    <button class="dropdown-item" :href="route('profile')" wire:navigate>
                        <span class="icon-[tabler--user]"></span>
                        My Profile
                    </button>
                </li>
                <li class="dropdown-footer gap-2">
                    <button class="btn btn-error btn-soft btn-block" wire:click="logout">
                        <span class="icon-[tabler--logout]"></span>
                        Sign out
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
