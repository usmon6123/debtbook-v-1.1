@php
    use App\services\MainService;

        $mainService = new Mainservice();
@endphp

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
                        <x-slot:botton>
                            <form action="{{route('debt-list.create-form')}}" method="post">
                                @csrf
                                <input type="hidden" name="debtorId" value="{{$debtList[0]->debtor->id??''}}">
                                <input type="hidden" name="debtorName" value="{{$debtList[0]->debtor->name??''}}">
                                <input type="hidden" name="sellerId" value="{{$debtList[0]->seller->id??''}}">
                                <button type="submit"
                                        class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                    Yangi Hisobot
                                </button>
                            </form>
                        </x-slot:botton>
                        <x-slot:name>{{$debtList[0]->debtor->name??''}}</x-slot:name>
                        <x-slot:total>{{$debtList[0]->debtor->total??''}}</x-slot:total>
                        @foreach($debtList as $debt)
                            <x-debt-list>
                                @php $date = $mainService->dateFormat($debt->created_at); @endphp
                                <x-slot:created_at>{{$date??''}}</x-slot:created_at>
                                <x-slot:debt_sum>{{$debt->debt_sum??''}}</x-slot:debt_sum>
                                <x-slot:seller>{{$debt->seller->name??''}}</x-slot:seller>
                                <x-slot:description>{{$debt->description??''}}</x-slot:description>
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
