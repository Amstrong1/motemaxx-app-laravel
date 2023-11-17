<x-app-layout>
    <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="mx-6 border-b-2" style="border-color: #4f364b">
                <div class="py-4 text-black text-center font-bold">
                    {{ __('Motemaxx vous souhaite la bienvenue') }}
                </div>

                <div class="py-4 text-gray-900 uppercase text-center text-xs">
                    {{ __('Répondez à ce petit questionnaire') }}
                </div>
            </div>

            <form action="{{ route('user_consultation.store') }}" method="post" class="">
                @csrf
                @php
                    $i = 0;
                @endphp
                @foreach ($consultations as $consultation)
                    <input type="hidden" name="consultation_id[]" value="{{ $consultation->id }}">
                    <div class="relative my-4 p-4">
                        <label class="my-1" for="">{!! $consultation->name !!}</label>
                        @if ($consultation->resConsultations()->get() !== null && $consultation->resConsultations()->count() !== 0)
                            <div>
                                <select class="block mt-1 w-full border-2 p-2 rounded outline-0" name="{{ 'answer['. $i .'][]' }}"
                                    required data-te-select-init multiple>
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
                                <textarea name="{{ 'description['. $i .']' }}" id="" class="bg-transparent block mt-1 w-full border-2 p-2 rounded outline-0"></textarea>
                            </div>
                        @endif
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
                <div class="p-4">
                    Veuillez noter que pour les personnes hésitant ou incertaines, un certificat médical sera demandé
                    avant de procéder aux traitements. De plus, veuillez prendre en compte que l'institut n'est pas
                    responsable des réactions qui peuvent survenir après avoir communiqué les informations.
                </div>
                <div class="p-4">
                    N'oubliez pas de consulter un professionnel de la santé ou un spécialiste avant de subir tout
                    traitement esthétique, surtout si vous avez des préoccupations médicales importantes.
                </div>
                <div class="text-center">
                    <x-primary-button type="submit" class="">
                        <span class="p-2 text-center">Envoyer</span>
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
