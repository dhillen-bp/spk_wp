<div class="mt-5 space-y-6">
    <div class="w-full rounded-lg border border-base-content/25 px-4 py-2 text-sm">
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumbs-separator rtl:-rotate-[40deg]">/</li>
                <li>
                    <a href="#">Data Employe Score</a>
                </li>
                <li class="breadcrumbs-separator rtl:-rotate-[40deg]">/</li>
                <li aria-current="page">Create Employe Score</li>
            </ul>
        </div>
    </div>
    <h3 class="text-lg">Create Employe Score</h3>
    <form wire:submit="save">
        <div class="form-control mb-6 md:w-1/2">
            <label class="label mb-[2px]" for="employee">Employee Name</label>
            <select wire:model="form.employee_id"
                class="@error('form.employee_id')
            is-invalid
           @enderror select" id="employee">
                <option value="" disabled selected>-</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
            @error('form.employee_id')
                <div class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </div>
                <span class="error"></span>
            @enderror
        </div>

        @foreach ($criterias as $criteria)
            <div class="form-control mb-6 md:w-1/2" wire:key="{{ $criteria->id }}">
                <label class="label-text" for="number-input-label">Quantity:</label>

                <input wire:model="form.scores.{{ $criteria->id }}"
                    class="@error('form.scores.' . $criteria->id)
                        is-invalid
                        @enderror input"
                    id="number-input-label" type="number" value="0" min="0" max="10"
                    data-input-number-input />

                @error('form.scores.' . $criteria->id)
                    <div class="label">
                        <span class="label-text-alt">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        @endforeach


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
