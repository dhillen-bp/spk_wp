@props([
    'dataId' => null,
    'dataDesc' => 'this data',
])

<div id="modal-delete-{{ $dataId }}"
    class="overlay modal hidden [--overlay-backdrop:static] overlay-open:opacity-100" role="dialog" tabindex="-1"
    data-overlay-keyboard="false">
    <div
        class="overlay-animation-target modal-dialog mt-12 transition-all ease-out overlay-open:mt-4 overlay-open:opacity-100 overlay-open:duration-500">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Delete Data</h3>
                <button type="button" class="btn btn-circle btn-text btn-sm absolute end-3 top-3" aria-label="Close"
                    data-overlay="#modal-delete-{{ $dataId }}">
                    <span class="size-4 icon-[tabler--x]"></span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure delete {{ $dataDesc }}?

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-soft"
                    data-overlay="#modal-delete-{{ $dataId }}">
                    No
                </button>
                <button wire:click="destroy({{ $dataId }})" type="button" class="btn btn-error">Yes</button>
            </div>
        </div>
    </div>
</div>
