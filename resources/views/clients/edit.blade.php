<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('clients.update', $client) }}">
            @csrf
            @method('patch')
            <div>
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $client->name)" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="debt" :value="__('Crédito')" />
                <x-float-input id="debt" class="block mt-1 w-full" type="number" name="debt" :value="old('debt', $client->debt)" required autofocus />
                <x-input-error :messages="$errors->get('debt')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="date" :value="__('Data')" />
                <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date', $client->date)" required autofocus />
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>

            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
            <a href="{{ route('clients.index') }}">{{ __('Voltar') }}</a>
    </div>
    </form>
    </div>
</x-app-layout>