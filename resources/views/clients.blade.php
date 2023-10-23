<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Here are the list of your clients:</p>

                    @foreach($clients as $client)
                        <h3 class="text-lg text-gray-500">{{$client -> name}}</h3>
                        <p><b>Client ID: </b>{{ $client->id}}</p>
                        <p><b>Client Redirect: </b>{{ $client->redirect  }}</p>
                        <p><b>Client Secret: </b>{{ $client->secret }}</p>
                    @endforeach
                </div>

                <div class=" mt2 p-6 text-gray-900 dark:text-gray-100">
                <form action="/oauth/clients" method="POST">

                    <div>
                            <x-input-label for="name">Name</x-input-label>
                            <x-text-input type="text" name="name" placeholder="Client Name"></x-text-input>
                    </div>
                    <div class="mt-2">
                        <x-input-label for="redirect">Redirect</x-input-label>
                        <x-text-input type="text" name="redirect" placeholder="https://my-url.com/callback"></x-text-input>
                    </div>
                    <div class="mt-3">
                        @csrf
                        <x-primary-button type="submit">Create Client</x-primary-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
