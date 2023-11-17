<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form class="mt-4" action="{{ route('reservation.store') }}" method="post">
                @csrf
                <div class="p-6">
                    @if (session('prestation_id') !== null)
                        <div class="relative my-4">
                            <select name="prestation_id" data-te-select-init>
                                @foreach ($prestations as $prestation)
                                    @if (session('prestation_id') == $prestation->id)
                                        <option value="{{ $prestation->id }}"> {{ $prestation->name }} </option>
                                    @endif
                                @endforeach
                            </select>
                            <label data-te-select-label-ref>Prestation Sélectionnée</label>
                        </div>
                    @endif

                    <div class="relative my-4">
                        <select name="prestations[]" data-te-select-init multiple>
                            @foreach ($prestations as $prestation)
                                @if (session('prestation_id') !== $prestation->id)
                                    <option value="{{ $prestation->id }}"> {{ $prestation->name }} </option>
                                @endif
                            @endforeach
                        </select>
                        <label data-te-select-label-ref>Sélectionner Prestations</label>
                    </div>
                    <x-input-error :messages="$errors->get('prestations')" class="mt-2" />

                    <div id="datepicker-disabled-dates" class="relative my-4" data-te-datepicker-init
                        data-te-input-wrapper-init data-theme="light">
                        <input type="text" name="date"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            placeholder="Select a date" />
                        <label for="floatingInput"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Date
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />

                    <div class="relative my-4">
                        <select name="hours[]" data-te-select-init multiple>
                            @for ($i = 8; $i < 18; $i++)
                                <option value="{{ $i . ':' . '00' . ' - ' . $i + 1 . ':' . '00' }}">
                                    {{ $i . ':' . '00' . ' - ' . $i + 1 . ':' . '00' }}
                                </option>
                            @endfor
                        </select>
                        <label data-te-select-label-ref>Heures</label>
                    </div>
                    <x-input-error :messages="$errors->get('hours')" class="mt-2" />

                    {{-- <div id="timepicker-format" class="relative my-4" data-te-format24="true" data-te-timepicker-init
                        data-te-input-wrapper-init>
                        <input type="text" name="time_start"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="form1" />
                        <label for="form1"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Heure début
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('time_start')" class="mt-2" />

                    <div id="timepicker-format2" class="relative my-4" data-te-format24="true" data-te-timepicker-init
                        data-te-input-wrapper-init>
                        <input type="text" name="time_end"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="form1" />
                        <label for="form1"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Heure Fin
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('time_end')" class="mt-2" /> --}}

                    <div class="text-center">
                        <x-primary-button type="submit" class="w-full">
                            <span class="p-2 text-center">Prenez un rendez-vous</span>
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    const datepickerWithFilter = document.getElementById('datepicker-disabled-dates');

    const filterFunction = (date) => {
        const isSunday = date.getDay() === 0;
        const isWednesday = date.getDay() === 3;
        const isThursday = date.getDay() === 4;
        const isFriday = date.getDay() === 5;
        const isSaturday = date.getDay() === 6;

        return !isSunday && !isWednesday && !isThursday && !isFriday && !isSaturday;
    }

    new te.Datepicker(datepickerWithFilter, {
        filter: filterFunction,
        disablePast: true
    });
</script>
