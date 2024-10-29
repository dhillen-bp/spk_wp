<div class="mt-5 space-y-6">
    <div class="w-full rounded-lg border border-base-content/25 px-4 py-2 text-sm">
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumbs-separator rtl:-rotate-[40deg]">/</li>
                <li>
                    <a href="#">Data Employee</a>
                </li>
                <li class="breadcrumbs-separator rtl:-rotate-[40deg]">/</li>
                <li aria-current="page">Create Employee</li>
            </ul>
        </div>
    </div>
    <h3 class="text-lg">Create Employee</h3>
    <form wire:submit="store">
        <label class="form-control mb-6 md:w-1/2">
            <div class="label">
                <span class="label-text">Full Name</span>
            </div>
            <input type="text" placeholder="John Doe"
                class="@error('name')
             is-invalid
            @enderror input" wire:model="name" />
            @error('name')
                <div class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </div>
                <span class="error"></span>
            @enderror
        </label>
        <label class="form-control mb-6 md:w-1/2">
            <div class="label">
                <span class="label-text">Position</span>
            </div>
            <input type="text" placeholder="HRD Recruiter"
                class="@error('position')
             is-invalid
            @enderror input" wire:model="position" />
            @error('position')
                <div class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </div>
                <span class="error"></span>
            @enderror
        </label>
        <label class="form-control mb-6 md:w-1/2">
            <div class="label">
                <span class="label-text">Department</span>
            </div>
            <input type="text" placeholder="Human Resource Departement (HRD)"
                class="@error('department')
             is-invalid
            @enderror input"
                wire:model="department" />
            @error('department')
                <div class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </div>
                <span class="error"></span>
            @enderror
        </label>

        <button type="submit" class="btn btn-primary w-full md:w-1/2">Submit</button>
    </form>
</div>
