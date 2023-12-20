<x-app-layout>
    <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="mx-6 border-b-2" style="border-color: #4f364b">
                <div class="py-4 text-black text-center font-bold text-md">
                    {{ __('Motemaxx vous souhaite la bienvenue') }}
                </div>

                <div class="py-4 text-gray-900 uppercase text-center text-sm">
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
                    <div class="relative my-4 p-4 text-lg">
                        <label class="my-1" for="">{!! $consultation->name !!}</label>
                        @if ($consultation->resConsultations()->get() !== null && $consultation->resConsultations()->count() !== 0)
                            <div>
                                <select class="block mt-1 w-full border-2 p-2 rounded outline-0"
                                    name="{{ 'answer[' . $i . '][]' }}" required data-te-select-init multiple>
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
                                <textarea name="{{ 'description[' . $i . ']' }}" id=""
                                    class="bg-transparent block mt-1 w-full border-2 p-2 rounded outline-0"></textarea>
                            </div>
                        @endif
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach


                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <div class="p-4">
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __(' Veuillez noter que pour les personnes hésitantes ou incertaines, un certificat médical sera demandé avant de procéder aux traitements. De plus, veuillez prendre en compte que l\'institut n\'est pas responsable des réactions qui peuvent survenir après avoir communiqué les informations.') }}
                        </p>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __(' N\'oubliez pas de consulter un professionnel de la santé ou un spécialiste avant de subir tout traitement esthétique, surtout si vous avez des préoccupations médicales importantes.') }}
                        </p>

                        <div class="mt-6 flex justify-end">
                            <x-primary-button onclick="event.preventDefault(); this.closest('form').submit();"
                                class="ms-3">
                                {{ __('J\'accepte les conditions') }}
                            </x-primary-button>
                        </div>
                    </div>
                </x-modal>
            </form>

            <div class="text-center">
                <x-primary-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                    {{ __('Envoyer') }}</x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>
