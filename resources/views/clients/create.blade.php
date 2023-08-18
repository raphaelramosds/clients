<x-app-layout>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('clients.import') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <x-input-label for="file" :value="__('Arquivo (csv)')" />
                <x-text-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')" autofocus />
                <x-input-error :messages="$errors->get('file')" class="mt-2" />
            </div>
            <x-primary-button class="mt-4 mb-8">{{ __('Importar') }}</x-primary-button>
        </form>

        <form method="POST" action="{{ route('clients.store') }}">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="debt" :value="__('Débito')" />
                <x-float-input id="debt" class="block mt-1 w-full" type="number" name="debt" :value="old('debt')" required autofocus />
                <x-input-error :messages="$errors->get('debt')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="date" :value="__('Data')" />
                <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus />
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>

            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Salvar') }}</x-primary-button>
        </form>
</x-app-layout>