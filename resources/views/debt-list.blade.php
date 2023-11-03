
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
{{--                        @dd($debtList)--}}
                        <x-slot:clearButton>
{{--                            @dd($debtList)--}}
                            <form action="{{ route('debt-list.deleteByDebtorId') }}" method="post">
                                @csrf
                                <input type="hidden" name="seller_id" value="{{$debtList[0]->seller->id}}">
                                <input type="hidden" name="debtor_id" value="{{$debtList[0]->debtor->id}}">
                                <input type="hidden" name="debt_sum" value="{{$debtList[0]->debt_sum}}">
                                <button type="submit" onclick="return confirm('Bu mijozning tarixini o\'chirishga aminmisiz?')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Tarixni tozalash</button>
                            </form>
                        </x-slot:clearButton>


                        <x-slot:botton>
                            <form action="{{route('debt-list.create-form')}}" method="POST">
                                @csrf
                                <input type="hidden" name="debtorId" value="{{$debtList[0]->debtor->id}}">
                                <input type="hidden" name="debtorName" value="{{$debtList[0]->debtor->name??''}}">
{{--                                <input type="hidden" name="sellerId" value="{{$debtList[0]->seller->id}}">--}}
                                <input type="hidden" name="total" value="{{$debtList[0]->debtor->total??''}}">
                                <button type="submit"
                                        class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                    Yangi Hisobot
                                </button>
                            </form>
                        </x-slot:botton>
                        <x-slot:name>{{$debtList[0]->debtor->name??''}}</x-slot:name>
                        <x-slot:total>{{$debtList[0]->debtor->total??''}}</x-slot:total>
                        @if(isset($debtList))
                            @foreach($debtList as $debt)
                                <x-debt-list>
                                    @php $date = date_format($debt->created_at,'d-m-y || H:i'); @endphp
                                    <x-slot:created_at>{{$date??''}}</x-slot:created_at>
                                    <x-slot:debt_sum>{{$debt->debt_sum??''}}</x-slot:debt_sum>
                                    <x-slot:seller>{{$debt->seller->name??''}}</x-slot:seller>
                                    <x-slot:description>{{$debt->description??''}}</x-slot:description>
                                </x-debt-list>
                            @endforeach
                        @endif

                    </x-header-debt-list>


{{--                    <a href="{{route('dashboard')}}">--}}
{{--                        <x-danger-button>--}}
{{--                            Ortga--}}
{{--                        </x-danger-button>--}}
{{--                    </a>--}}

                </div>

            </div>
        </div>
    </div>
</x-app-layout>



