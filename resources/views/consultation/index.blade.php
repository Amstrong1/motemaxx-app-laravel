<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="mx-6 border-b-2" style="border-color: #4f364b">
                <div class="py-4 text-black text-center font-bold">
                    {{ __('Motemaxx vous souhaite la bienvenue') }}
                </div>

                <div class="py-4 text-gray-900 uppercase text-center text-xs">
                    {{ __('Répondez à ce petit questionnaire') }}
                </div>
            </div>


            <form action="" method="post" class="">
                @foreach ($consultations as $consultation)
                    <div class="relative my-4 p-4">
                        <label class="my-1" for="">{!! $consultation->name !!}</label>
                        @if ($consultation->resConsultations()->get() !== null && $consultation->resConsultations()->count() !== 0)
                            <div>
                                <select class="block mt-1 w-full border-2 p-2 rounded outline-0" name="" data-te-select-init multiple>
                                    @foreach ($consultation->resConsultations()->get() as $resConsultation)
                                        <option value="{{ $resConsultation->id }}">{{ $resConsultation->answer }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        @if ($consultation->description == true)
                            <label class="my-1" for="">Autres à préciser</label>
                            <div>
                                <textarea name="" id="" class="bg-transparent block mt-1 w-full border-2 p-2 rounded outline-0"></textarea>
                            </div>
                        @endif
                    </div>
                @endforeach
            </form>
        </div>
    </div>
</x-app-layout>
