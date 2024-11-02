<div class="mt-5 w-full overflow-x-auto">
    <div class="flex h-auto items-center justify-between gap-3">
        <a href="{{ route('criteria.create') }}" wire:navigate class="btn btn-primary btn-sm md:btn md:btn-primary">Add
            Criteria</a>
        <input wire:model.live.debounce.300ms="search" type="text" class="input h-full max-w-sm rounded-full"
            placeholder="search" aria-label="input" />
    </div>
    <div class="mt-5 shadow-md">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Weight</th>
                    <th>Type</th>
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

                @forelse ($criterias as $criteria)
                    <tr>
                        <td>{{ $loop->index + $criterias->firstItem() }}</td>
                        <td class="text-nowrap">{{ $criteria->name }}</td>
                        <td>{{ $criteria->weight }}</td>
                        <td><span
                                class="{{ $criteria->type == 'benefit' ? 'badge-success' : 'badge-error' }} badge badge-soft text-xs">{{ $criteria->type }}</span>
                        </td>
                        <td>
                            <a href="{{ route('criteria.edit', $criteria) }}" wire:navigate
                                class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                    class="icon-[tabler--pencil]"></span></a>
                            <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"
                                aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="modal-delete-{{ $criteria->id }}"
                                data-overlay="#modal-delete-{{ $criteria->id }}"><span
                                    class="icon-[tabler--trash]"></span></button>
                            <x-modal-delete :dataId="$criteria->id" :dataDesc="$criteria->name" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No data found.</td>
                    </tr>
                @endforelse
            </tbody>

            <tfoot>
                <tr class="border-t border-base-content/25">
                    <th colspan="2" class="border-r border-slate-500 border-opacity-50 text-end">Total Weight = </th>
                    <th colspan="3"> {{ $totalWeight }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mt-6">
        {{ $criterias->links('components/custom-pagination-links-view') }}
    </div>
</div>
