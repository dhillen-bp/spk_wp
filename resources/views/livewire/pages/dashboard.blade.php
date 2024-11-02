<div class="my-10 space-y-4 md:space-y-8">
    <div class="grid grid-cols-2 gap-3 md:grid-cols-4 md:gap-4">
        <div class="card h-40 bg-base-200 md:h-32">
            <div class="my-auto flex flex-col items-center justify-center gap-2 md:flex-row md:gap-3">
                <span class="size-15 icon-[mdi--person-group] inline-block self-center"></span>
                <div class="text-center md:ml-2 md:text-start">
                    <h5 class="text-lg text-slate-500">Total Employees Rated</h5>
                    <p class="text-2xl font-bold">{{ $totalEmployees }}</p>
                </div>
            </div>
        </div>

        <div class="card h-40 bg-base-200 md:h-32">
            <div class="my-auto flex flex-col items-center justify-center gap-2 md:flex-row md:gap-3">
                <span class="size-15 icon-[mdi--person-star] inline-block self-center"></span>
                <div class="text-center md:ml-2 md:text-start">
                    <h5 class="text-lg text-slate-500">Top Scorer</h5>
                    <p class="text-lg font-semibold">{{ $topScorer->employee->name ?? 'N/A' }}</p>
                    <p class="text-xl font-bold">{{ $topScorer->final_score ?? '0' }}</p>
                </div>
            </div>
        </div>

        <div class="card h-40 bg-base-200 md:h-32">
            <div class="my-auto flex flex-col items-center justify-center gap-2 md:flex-row md:gap-3">
                <span class="size-15 icon-[hugeicons--chart-average] inline-block self-center"></span>
                <div class="text-center md:ml-2 md:text-start">
                    <h5 class="text-lg text-slate-500">Average Score</h5>
                    <p class="text-2xl font-bold">{{ number_format($averageScore, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="card h-40 bg-base-200 md:h-32">
            <div class="my-auto flex flex-col items-center justify-center gap-2 md:flex-row md:gap-3">
                <span class="size-15 icon-[lsicon--building-filled] inline-block self-center"></span>
                <div class="text-center md:ml-2 md:text-start">
                    <h5 class="text-lg text-slate-500">Total Department</h5>
                    <p> <span class="text-2xl font-bold">{{ $departmentsRated }}</span> <span class="font-thin">
                            Departments</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-3 md:grid-cols-2 md:gap-4">
        <div class="w-full overflow-x-auto rounded-lg bg-base-200">
            <table class="table">
                <caption class="p-5 text-left text-lg font-semibold text-base-content/90 rtl:text-right">
                    List of Top 10 Employees
                    <p class="mt-1 text-sm font-normal text-base-content/80">
                        Browse more employee ranking lists: <a href="{{ route('ranking.index') }}" wire:navigate
                            class="hover:text-slate-500">at
                            this
                            link.</a>
                    </p>
                </caption>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Final Score</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bestRankings as $rank)
                        <tr>
                            <td>{{ $loop->index + $bestRankings->firstItem() }}</td>
                            <td class="text-nowrap">{{ $rank->employee->name }}</td>
                            <td>{{ $rank->final_score }}</td>
                            <td>
                                <div class="tooltip">
                                    <button class="tooltip-toggle btn btn-circle btn-text btn-sm"
                                        aria-label="Detail button" aria-haspopup="dialog" aria-expanded="false"
                                        aria-controls="modal-detail-{{ $rank->id }}"
                                        data-overlay="#modal-detail-{{ $rank->id }}"><span
                                            class="icon-[tabler--dots-vertical]"></span></button>
                                    <span class="tooltip-content tooltip-shown:visible tooltip-shown:opacity-100"
                                        role="tooltip">
                                        <span class="tooltip-body tooltip-primary">Detail Data</span>
                                    </span>
                                </div>
                            </td>
                            <x-modal-detail :data="$rank" />
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No data found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="w-full overflow-x-auto rounded-lg bg-base-200">
            <table class="table">
                <caption class="p-5 text-left text-lg font-semibold text-base-content/90 rtl:text-right">
                    List of 10 Worst Employees
                    <p class="mt-1 text-sm font-normal text-base-content/80">
                        Browse more employee ranking lists: <a href="{{ route('ranking.index') }}" wire:navigate
                            class="hover:text-slate-500">at
                            this
                            link.</a>
                    </p>
                </caption>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Final Score</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($worstRankings as $rank)
                        <tr>
                            <td>{{ $loop->index + $worstRankings->firstItem() }}</td>
                            <td class="text-nowrap">{{ $rank->employee->name }}</td>
                            <td>{{ $rank->final_score }}</td>
                            <td>
                                <div class="tooltip">
                                    <button class="tooltip-toggle btn btn-circle btn-text btn-sm"
                                        aria-label="Detail button" aria-haspopup="dialog" aria-expanded="false"
                                        aria-controls="modal-detail-{{ $rank->id }}"
                                        data-overlay="#modal-detail-{{ $rank->id }}"><span
                                            class="icon-[tabler--dots-vertical]"></span></button>
                                    <span class="tooltip-content tooltip-shown:visible tooltip-shown:opacity-100"
                                        role="tooltip">
                                        <span class="tooltip-body tooltip-primary">Detail Data</span>
                                    </span>
                                </div>
                            </td>
                            <x-modal-detail :data="$rank" />
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No data found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
