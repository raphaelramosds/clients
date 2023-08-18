<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <div class="pb-4 text-gray-900">
            <x-primary-link :href="route('clients.create')">
                {{ __('Adicionar cliente') }}
            </x-primary-link>
        </div>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="py-3 px-6 text-left text-gray-600 uppercase font-semibold text-sm bg-gray-100 border-b border-gray-300">
                                Identificador
                            </th>
                            <th class="py-3 px-6 text-left text-gray-600 uppercase font-semibold text-sm bg-gray-100 border-b border-gray-300">
                                Nome
                            </th>
                            <th class="py-3 px-6 text-left text-gray-600 uppercase font-semibold text-sm bg-gray-100 border-b border-gray-300">
                                Débito
                            </th>
                            <th class="py-3 px-6 text-left text-gray-600 uppercase font-semibold text-sm bg-gray-100 border-b border-gray-300">
                                Data
                            </th>
                            <th class="py-3 px-6 text-center text-gray-600 uppercase font-semibold text-sm bg-gray-100 border-b border-gray-300">
                                Ações
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clients as $client)
                        <tr class="border-b border-gray-300">
                            <td class="py-4 px-6 border-b border-gray-300">{{ $client->identity }}</td>
                            <td class="py-4 px-6 border-b border-gray-300">{{ $client->name }}</td>
                            <td class="py-4 px-6 border-b border-gray-300">{{ $client->debt }}</td>
                            <td class="py-4 px-6 border-b border-gray-300">{{ $client->date }}</td>
                            <td class="py-4 px-6 text-center border-b border-gray-300">
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('clients.edit', $client)">
                                            {{ __('Editar') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('clients.destroy', $client) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('clients.destroy', $client)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>

                                    </x-slot>
                                </x-dropdown>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</x-app-layout>