<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-header-list>
                        @foreach($debtors as $debtor)
                            <x-list-debtors>
                                <x-slot:name>{{$debtor->name}}</x-slot:name>
                                <x-slot:id>{{$debtor->id}}</x-slot:id>
                                <x-slot:phone_number>{{$debtor->phone_number}}</x-slot:phone_number>
                                <x-slot:total>{{$debtor->total}}</x-slot:total>
                                <x-slot:description>{{$debtor->description}}</x-slot:description>
                                <x-slot:edit>
                                    <a href="{{ route('user.edit', $debtor->id) }}">
{{--                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Düzenle  --}}
{{--                                        <i class="ml-2 fas fa-pencil-alt"></i>--}}
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"/></svg>
                                    </a>
                                </x-slot:edit>
                                <x-slot:delete>
                                    <form method="POST" action="{{ route('user.destroy', $debtor->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                        </svg>
                                        </button>
{{--                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Sil</button>--}}
                                    </form>
                                </x-slot:delete>
                            </x-list-debtors>
                        @endforeach

                    </x-header-list>

                    <div class="mt-12 col-md-auto align-content-center">
                        {{$debtors->links()}}
                    </div>
                    @if(session('search')=='yes')
                        @php session()->put('search', 'not'); @endphp
                        <x-danger-button>
                            <a href="{{route('dashboard')}}">Ortga</a>
                        </x-danger-button>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
