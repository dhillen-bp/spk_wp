<div class="mt-5 w-full overflow-x-auto">
    <div class="flex h-auto items-center justify-between gap-3">
        <a href="{{ route('calculate.index') }}" wire:navigate class="btn btn-primary btn-sm md:btn md:btn-primary">Check
            Calculate</a>
        <input wire:model.live.debounce.300ms="search" type="text" class="input h-full max-w-sm rounded-full"
            placeholder="search" aria-label="input" />
    </div>
    <div class="mt-5 shadow-md">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Final Score</th>
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

                @forelse ($rankings as $rank)
                    <tr>
                        <td>{{ $loop->index + $rankings->firstItem() }}</td>
                        <td class="text-nowrap">{{ $rank->employee->name }}</td>
                        <td>{{ $rank->final_score }}</td>
                        <td>
                            <div class="tooltip">
                                <button class="tooltip-toggle btn btn-circle btn-text btn-sm"
                                    aria-label="Detail button"><span
                                        class="icon-[tabler--dots-vertical]"></span></button>
                                <span class="tooltip-content tooltip-shown:visible tooltip-shown:opacity-100"
                                    role="tooltip">
                                    <span class="tooltip-body tooltip-primary">Detail Data</span>
                                </span>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $rankings->links('components/custom-pagination-links-view') }}
    </div>
</div>
