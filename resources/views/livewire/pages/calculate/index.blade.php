<div class="accordion-shadow accordion space-y-5" data-accordion-always-open="true">
    <div class="accordion-item active bg-base-200" id="criteria">
        <button class="accordion-toggle inline-flex items-center gap-x-4 px-5 py-4 text-start"
            aria-controls="criteria-collapse" aria-expanded="true">
            <span
                class="size-4.5 icon-[tabler--plus] block shrink-0 text-base-content accordion-item-active:hidden"></span>
            <span
                class="size-4.5 icon-[tabler--minus] hidden shrink-0 text-base-content accordion-item-active:block"></span>
            Criteria
        </button>
        <div id="criteria-collapse" class="accordion-content w-full overflow-hidden transition-[height] duration-300"
            aria-labelledby="criteria" role="region">
            <div class="px-5 pb-4">
                <div class="w-full overflow-x-auto border border-base-content/25">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border border-base-content/25">Name</th>
                                <th class="border border-base-content/25">Type</th>
                                <th class="border border-base-content/25">Weight</th>
                                <th class="border border-base-content/25">Exponent (Pangkat)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criterias as $criteria)
                                <tr>
                                    <td class="text-nowrap border border-base-content/25">{{ $criteria->name }}</td>
                                    <td class="border border-base-content/25">
                                        <span
                                            class="badge badge-success badge-soft text-xs">{{ $criteria->type }}</span>
                                    </td>
                                    <td class="border border-base-content/25">{{ $criteria->weight }}</td>
                                    <td class="border border-base-content/25">{{ $criteria->weight / 100 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item active bg-base-200" id="alternative-value">
        <button class="accordion-toggle inline-flex items-center gap-x-4 px-5 py-4 text-start"
            aria-controls="alternative-value-collapse" aria-expanded="true">
            <span
                class="size-4.5 icon-[tabler--plus] block shrink-0 text-base-content accordion-item-active:hidden"></span>
            <span
                class="size-4.5 icon-[tabler--minus] hidden shrink-0 text-base-content accordion-item-active:block"></span>
            Alternative Value / Employee Score
        </button>
        <div id="alternative-value-collapse"
            class="accordion-content w-full overflow-hidden transition-[height] duration-300"
            aria-labelledby="alternative-value" role="region">
            <div class="px-5 pb-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="border border-base-content/25">Name</th>
                            @foreach ($criterias as $criteria)
                                <th class="border border-base-content/25">{{ $criteria->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="text-nowrap border border-base-content/25">{{ $employee->name }}</td>
                                @for ($i = 0; $i < $criterias->count(); $i++)
                                    @php
                                        $score = $employee->scores->where('criteria_id', $criterias[$i]->id)->first();
                                    @endphp
                                    <td class="border border-base-content/25">{{ $score ? $score->score : '-' }}</td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="accordion-item active bg-base-200" id="normalization">
        <button class="accordion-toggle inline-flex items-center gap-x-4 px-5 py-4 text-start"
            aria-controls="normalization-collapse" aria-expanded="true">
            <span
                class="size-4.5 icon-[tabler--plus] block shrink-0 text-base-content accordion-item-active:hidden"></span>
            <span
                class="size-4.5 icon-[tabler--minus] hidden shrink-0 text-base-content accordion-item-active:block"></span>
            Normalization
        </button>
        <div id="normalization-collapse"
            class="accordion-content w-full overflow-hidden transition-[height] duration-300"
            aria-labelledby="normalization" role="region">
            <div class="px-5 pb-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="border border-base-content/25">Name</th>
                            @foreach ($criterias as $criteria)
                                <th class="border border-base-content/25">{{ $criteria->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="text-nowrap border border-base-content/25">{{ $employee->name }}</td>
                                @foreach ($criterias as $criteria)
                                    @php
                                        // Ambil nilai normalisasi dari array normalizedScores
                                        $normalizedScore = $normalizedScores[$employee->id][$criteria->id] ?? '-';
                                    @endphp
                                    <td class="border border-base-content/25">{{ $normalizedScore }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>
    </div>

    <div class="accordion-item active bg-base-200" id="ranking">
        <button class="accordion-toggle inline-flex items-center gap-x-4 px-5 py-4 text-start"
            aria-controls="ranking-collapse" aria-expanded="true">
            <span
                class="size-4.5 icon-[tabler--plus] block shrink-0 text-base-content accordion-item-active:hidden"></span>
            <span
                class="size-4.5 icon-[tabler--minus] hidden shrink-0 text-base-content accordion-item-active:block"></span>
            Ranking
        </button>
        <div id="ranking-collapse" class="accordion-content w-full overflow-hidden transition-[height] duration-300"
            aria-labelledby="ranking" role="region">
            <div class="px-5 pb-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="border border-base-content/25">No</th>
                            <th class="border border-base-content/25">Name</th>
                            <th class="border border-base-content/25">Vector S</th>
                            <th class="border border-base-content/25">Vector V</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="border border-base-content/25">{{ $loop->iteration }}</td>
                                <td class="text-nowrap border border-base-content/25">{{ $employee->name }}</td>
                                <td class="border border-base-content/25">{{ $vectorS[$employee->id] ?? '-' }}</td>
                                <td class="border border-base-content/25">{{ $vectorV[$employee->id] ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <button wire:click="saveRankings" class="btn btn-primary w-full">Save Ranking Result</button>

</div>
