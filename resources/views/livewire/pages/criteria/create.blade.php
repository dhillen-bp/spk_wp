<div class="mt-5 space-y-6">
    <div class="w-full rounded-lg border border-base-content/25 px-4 py-2 text-sm">
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumbs-separator rtl:-rotate-[40deg]">/</li>
                <li>
                    <a href="#">Data Criteria</a>
                </li>
                <li class="breadcrumbs-separator rtl:-rotate-[40deg]">/</li>
                <li aria-current="page">Create Criteria</li>
            </ul>
        </div>
    </div>
    <h3 class="text-lg">Create Criteria</h3>
    <form wire:submit="save">
        <label class="form-control mb-6 md:w-1/2">
            <div class="label">
                <span class="label-text">Criteria Name</span>
            </div>
            <input type="text" placeholder="Teamwork"
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
                <span class="label-text">Weight</span>
            </div>
            <div class="input-group" data-input-number>
                <input wire:model="form.weight"
                    class="@error('form.weight')
                is-invalid
               @enderror input"
                    id="number-input-label" type="text" value="0" data-input-number-input
                    oninput="this.value = cleanInput(this.value);" />
                <span class="input-group-text gap-3">
                    <button type="button" class="size-[22px] btn btn-primary btn-soft min-h-0 rounded p-0"
                        aria-label="Decrement button" data-input-number-decrement>
                        <span class="size-3.5 icon-[tabler--minus] flex-shrink-0"></span>
                    </button>
                    <button type="button" class="size-[22px] btn btn-primary btn-soft min-h-0 rounded p-0"
                        aria-label="Increment button" data-input-number-increment>
                        <span class="size-3.5 icon-[tabler--plus] flex-shrink-0"></span>
                    </button>
                </span>
            </div>
            @error('form.weight')
                <div class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </div>
                <span class="error"></span>
            @enderror
        </label>

        <label class="form-control mb-6 md:w-1/2">
            <div class="label">
                <span class="label-text">Type</span>
            </div>
            <select wire:model="form.type"
                class="@error('form.type')
            is-invalid
           @enderror select" id="favorite-simpson">
                <option selected disabled value="">-</option>
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select>
            @error('form.type')
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

<script>
    function cleanInput(value) {
        return value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
    }
</script>
