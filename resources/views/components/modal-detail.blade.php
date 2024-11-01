@props([
    'data' => null,
])

<div id="modal-detail-{{ $data->id }}" class="overlay modal hidden overlay-open:opacity-100" role="dialog"
    tabindex="-1">
    <div class="modal-dialog overlay-open:opacity-100">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detail Data</h3>
                <button type="button" class="btn btn-circle btn-text btn-sm absolute end-3 top-3" aria-label="Close"
                    data-overlay="#modal-detail-{{ $data->id }}">
                    <span class="size-4 icon-[tabler--x]"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mt-6 border-t border-base-content/25">
                    <dl class="divide-y divide-base-content/25">
                        <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="font-medium text-base-content/90">Employee Name</dt>
                            <dd class="mt-1 text-base-content/80 sm:col-span-2 sm:mt-0">{{ $data->employee->name }}</dd>
                        </div>
                        <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="font-medium text-base-content/90">Position</dt>
                            <dd class="mt-1 text-base-content/80 sm:col-span-2 sm:mt-0">{{ $data->employee->position }}
                            </dd>
                        </div>
                        <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="font-medium text-base-content/90">Department</dt>
                            <dd class="mt-1 text-base-content/80 sm:col-span-2 sm:mt-0">
                                {{ $data->employee->department }}</dd>
                        </div>
                        <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="font-medium text-base-content/90">Description</dt>
                            <dd class="mt-1 text-base-content/80 sm:col-span-2 sm:mt-0">
                                {{ $data->employee->description ?? '-' }}
                            </dd>
                        </div>
                        @foreach ($data->employee->scores as $score)
                            <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="font-medium text-base-content/90">{{ $score->criteria->name }}</dt>
                                <dd class="mt-1 text-base-content/80 sm:col-span-2 sm:mt-0">{{ $score->score }}</dd>
                            </div>
                        @endforeach
                        <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="font-medium text-base-content/90">Final Score</dt>
                            <dd class="mt-1 text-base-content/80 sm:col-span-2 sm:mt-0">{{ $data->final_score }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-soft"
                    data-overlay="#modal-detail-{{ $data->id }}">Close</button>
            </div>
        </div>
    </div>
</div>
