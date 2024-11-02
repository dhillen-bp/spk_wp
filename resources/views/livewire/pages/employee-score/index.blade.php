<div class="mt-5 w-full overflow-x-auto">
    <div class="flex h-auto items-center justify-between gap-3">
        <a href="{{ route('employee_score.create') }}" wire:navigate
            class="btn btn-primary btn-sm md:btn md:btn-primary">Add
            Employee Score</a>
        <input wire:model.live.debounce.300ms="search" type="text" class="input h-full max-w-sm rounded-full"
            placeholder="search" aria-label="input" />
    </div>
    <div class="mt-5 shadow-md">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    @foreach ($criterias as $criteria)
                        <th>{{ $criteria->name }}</th>
                    @endforeach
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <tr wire:loading wire:target="search">
                    <td colspan="5">
                        <div class="flex items-center justify-center gap-2">
                            <span class="loading loading-spinner loading-sm"></span>
                            <span> Searching data... </span>
                        </div>
                    </td>
                </tr>

                @php
                    $criteriaCount = $criterias->count(); // Asumsikan variabel $criterias berisi semua kriteria
                @endphp

                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $loop->index + $employees->firstItem() }}</td>
                        <td class="text-nowrap">{{ $employee->name }}</td>

                        {{-- Iterasi sebanyak jumlah criteria --}}
                        @for ($i = 0; $i < $criteriaCount; $i++)
                            @php
                                $score = $employee->scores->where('criteria_id', $criterias[$i]->id)->first();
                            @endphp
                            <td>{{ $score ? $score->score : '-' }}</td>
                        @endfor

                        <td>
                            <a href="{{ route('employee_score.edit', $employee) }}" wire:navigate
                                class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                    class="icon-[tabler--pencil]"></span></a>
                            <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"
                                aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="modal-delete-{{ $employee->id }}"
                                data-overlay="#modal-delete-{{ $employee->id }}"><span
                                    class="icon-[tabler--trash]"></span></button>
                            <x-modal-delete :dataId="$employee->id" :dataDesc="$employee->name" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ 2 + $criteriaCount }}" class="text-center">No data found.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $employees->links('components/custom-pagination-links-view') }}
    </div>
</div>

<script>
    document.addEventListener('livewire:navigated', () => {

    });
</script>
