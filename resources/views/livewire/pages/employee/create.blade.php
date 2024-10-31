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
    <form wire:submit="save">
        <label class="form-control mb-6 md:w-1/2">
            <div class="label">
                <span class="label-text">Full Name</span>
            </div>
            <input type="text" placeholder="John Doe"
                class="@error('form.name')
             is-invalid
            @enderror input"
                wire:model="form.name" />
            @error('form.name')
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
                class="@error('form.position')
             is-invalid
            @enderror input"
                wire:model="form.position" />
            @error('form.position')
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
                class="@error('form.department')
             is-invalid
            @enderror input"
                wire:model="form.department" />
            @error('form.department')
                <div class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </div>
                <span class="error"></span>
            @enderror
        </label>

        <button type="submit" class="btn btn-primary block w-full md:w-1/2">
            Submit
        </button>

    </form>
</div>
