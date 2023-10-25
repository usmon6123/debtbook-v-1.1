<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tarix') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-header-debt-list>
                        <x-slot:name>{{$debtList[0]->debtor->name}}</x-slot:name>
                        <x-slot:id>{{$debtList[0]->debtor->id}}</x-slot:id>
                        <x-slot:total>{{$debtList[0]->debtor->total}}</x-slot:total>
                        @foreach($debtList as $debt)
                            <x-debt-list>
                                <x-slot:created_at>{{$debt->created_at}}</x-slot:created_at>
                                <x-slot:debt_sum>{{$debt->debt_sum}}</x-slot:debt_sum>
                                <x-slot:seller>{{$debt->seller->name}}</x-slot:seller>
                                <x-slot:description>{{$debt->description}}</x-slot:description>
                            </x-debt-list>
                        @endforeach

                    </x-header-debt-list>

                    <x-danger-button>
                        <a href="{{route('dashboard')}}">Ortga</a>
                    </x-danger-button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
