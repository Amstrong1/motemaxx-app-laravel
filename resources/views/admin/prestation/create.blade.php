<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Ajouter un service</h1>
                    <x-forms.create :fields="$my_fields" type="prestation" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{-- <x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6">
            <form action="{{ route('prestation.store') }}" method="post" enctype="multipart/form-data">
                @csrf
    
                <div class="my-2">
                    <label class="text-black" for="name">Nom</label>
                    <input id="name" name="name" type="text" class="mt-1 block w-full bg-transparent" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
    
                <div class="my-2">
                    <label class="text-black" for="name">Description</label>
                    <textarea class="w-full bg-transparent" name="description" id="description"></textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
    
                <div class="my-2">
                    <label class="text-black" for="logo">Logo</label>
                    <input type="file" name="logo" id="logo"
                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                    <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                </div>
    
                <div class="my-2">
                    <label class="text-black" for="images">Images</label>
                    <input type="file" name="images[]" id=""
                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
                         multiple>
                    <x-input-error class="mt-2" :messages="$errors->get('images')" />
                </div>

                <div class="my-2">
                    <button type="submit">Enregistré</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout> --}}
