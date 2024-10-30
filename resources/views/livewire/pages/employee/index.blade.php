<div class="mt-5 w-full overflow-x-auto">
    <div>
        <a href="{{ route('employee.create') }}" wire:navigate class="btn btn-primary">Add Employee</a>
    </div>
    <div class="mt-5 shadow-md">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-nowrap">{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td><span class="badge badge-success badge-soft text-xs">{{ $employee->department }}</span></td>
                        <td>
                            <a href="{{ route('employee.edit', $employee) }}" wire:navigate
                                class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                    class="icon-[tabler--pencil]"></span></a>
                            <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"
                                aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="modal-delete-{{ $employee->id }}"
                                data-overlay="#modal-delete-{{ $employee->id }}"><span
                                    class="icon-[tabler--trash]"></span></button>
                            <x-modal-delete :dataId="$employee->id" :dataDesc="$employee->name" />
                            <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                    class="icon-[tabler--dots-vertical]"></span></button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No data found.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
