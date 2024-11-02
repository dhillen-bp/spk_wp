<div class="md:mt-6">
    <div class="grid gap-6 md:grid-cols-3">
        <div class="flex flex-col items-center justify-center rounded-lg bg-base-200 px-3 py-10 md:col-span-1">
            <div class="avatar placeholder">
                <div class="w-32 rounded-full bg-neutral text-neutral-content">
                    <img src="{{ asset('images/default_user.jpeg') }}" alt="User Avatar" />
                </div>
            </div>
            <h2 class="mt-4 text-lg font-semibold">{{ $user->name }}</h2>
            <p class="mt-2 text-slate-500">{{ $user->email }}</p>
        </div>

        <div class="md:col-span-2">
            <h3 class="mb-4 text-lg font-semibold">Update Profile</h3>
            <form wire:submit.prevent="save" class="space-y-4">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Name</span>
                    </div>
                    <input wire:model="form.name" type="text" class="input" />
                </label>

                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Email</span>
                    </div>
                    <input wire:model="form.email" type="email" class="input" />
                </label>

                <div class="">
                    <div class="label">
                        <span class="label-text">Password</span>
                    </div>
                    <div class="mb-2 flex">
                        <div class="flex-1">
                            <input type="password" id="password-hints" class="input" placeholder="Enter password" />
                            <div data-strong-password='{
                            "target": "#password-hints",
                            "hints": "#password-hints-content",
                            "stripClasses": "strong-password:opacity-100 strong-password-accepted:bg-teal-500 h-2 flex-auto rounded-full bg-primary opacity-40 mx-1"
                          }'
                                class="-mx-1 mt-2.5 flex">
                            </div>
                        </div>
                    </div>
                    <div id="password-hints-content" class="mb-3">
                        <div>
                            <span class="text-sm text-base-content/90">Level:</span>
                            <span
                                data-pw-strength-hint='["Empty", "Weak", "Medium", "Strong", "Very Strong", "Super Strong"]'
                                class="text-sm font-semibold text-base-content/90">
                            </span>
                        </div>
                        <h6 class="my-2 text-base font-semibold text-base-content/90">Your password must contain:</h6>
                        <ul class="space-y-1 text-sm text-base-content/80">
                            <li data-pw-strength-rule="min-length"
                                class="flex items-center gap-x-2 strong-password-active:text-success">
                                <span class="size-5 icon-[tabler--circle-check] hidden flex-shrink-0" data-check></span>
                                <span class="size-5 icon-[tabler--circle-x] hidden flex-shrink-0" data-uncheck></span>
                                Minimum number of characters is 6.
                            </li>
                            <li data-pw-strength-rule="lowercase"
                                class="flex items-center gap-x-2 strong-password-active:text-success">
                                <span class="size-5 icon-[tabler--circle-check] hidden flex-shrink-0" data-check></span>
                                <span class="size-5 icon-[tabler--circle-x] hidden flex-shrink-0" data-uncheck></span>
                                Should contain lowercase.
                            </li>
                            <li data-pw-strength-rule="uppercase"
                                class="flex items-center gap-x-2 strong-password-active:text-success">
                                <span class="size-5 icon-[tabler--circle-check] hidden flex-shrink-0" data-check></span>
                                <span class="size-5 icon-[tabler--circle-x] hidden flex-shrink-0" data-uncheck></span>
                                Should contain uppercase.
                            </li>
                            <li data-pw-strength-rule="numbers"
                                class="flex items-center gap-x-2 strong-password-active:text-success">
                                <span class="size-5 icon-[tabler--circle-check] hidden flex-shrink-0" data-check></span>
                                <span class="size-5 icon-[tabler--circle-x] hidden flex-shrink-0" data-uncheck></span>
                                Should contain numbers.
                            </li>
                            <li data-pw-strength-rule="special-characters"
                                class="flex items-center gap-x-2 strong-password-active:text-success">
                                <span class="size-5 icon-[tabler--circle-check] hidden flex-shrink-0" data-check></span>
                                <span class="size-5 icon-[tabler--circle-x] hidden flex-shrink-0" data-uncheck></span>
                                Should contain special characters.
                            </li>
                        </ul>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-full">Save</button>
            </form>
        </div>
    </div>
</div>
