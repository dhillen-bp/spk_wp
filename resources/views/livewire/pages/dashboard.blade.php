<div class="mt-10 grid grid-cols-2 gap-3 md:grid-cols-4 md:gap-4">
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
