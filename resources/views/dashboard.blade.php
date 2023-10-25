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
