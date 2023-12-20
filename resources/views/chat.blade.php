<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="mt-4" action="{{ route('chat') }}" method="post">
                @csrf
                <div class="p-6">
                    <h1 class="font-bold text-md">Bonjour et bienvenue ! Je suis là pour vous aider et répondre à vos questions. N'hésitez pas à me poser tout ce qui vous préoccupe. Je suis un chatbot intelligent, donc même si je ne suis pas humain, je suis capable de vous fournir des réponses précises et rapides. Prêt à commencer ? Alors, dites-moi ce que je peux faire pour vous !</h1>
                    <div class="relative my-4">
                        <textarea type="text" name="prompt" class="w-full" rows="6" required
                        placeholder="Entrer votre question"></textarea>
                    </div>
                    <x-input-error :messages="$errors->get('prompt')" class="mt-2" />

                    <div class="">
                        <x-primary-button type="submit" class="w-full">
                            <span class="p-2 block mx-auto">Soumettre</span>
                        </x-primary-button>
                    </div>
                </div>
                <div class="p-6">
                    {!! $data['choices'][0]['message']['content'] ?? "" !!}
                </div>
            </form>
    </div>
</x-app-layout>
