

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
                    <div class="bg-white p-8 rounded-md w-full">
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{route('dashboard')}}">
                                <x-danger-button>
                                    Ortga
                                </x-danger-button>
                            </a>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Sana
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Mijoz
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Summa
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Sotuvchi
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            qo'shimcha
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                                                        @dd($debtsList)--}}
                                    @foreach($debtsList as $debtList)
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{date_format($debtList->updated_at??'','d-m-y || H:i')}}
                                                </p>
                                            </td>

                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$debtList->debtor->name??''}}
                                                </p>
                                            </td>

                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <b>{{number_format((string)$debtList->debt_sum??'','0','.',' ')}}</b>
                                                </p>
                                            </td>

                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$debtList->seller->name??''}}
                                                </p>
                                            </td>

                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$debtList->description??''}}
                                                </p>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>


                            </div>
                            <div class="mt-12 col-md-auto align-content-center">
                                {{$debtsList->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{--<div class="bg-white p-8 rounded-md w-full">--}}
{{--    <div class=" flex items-center justify-between pb-6">--}}
{{--        <div>--}}
{{--            <h2 class="text-gray-600 font-semibold">Ismi:{{$name}}</h2>--}}
{{--            <h3>Jami:{{number_format((string) $total, 0, '.', ' ')}} so'm</h3>--}}
{{--        </div>--}}
{{--        @if($total == '0')--}}
{{--            {{$clearButton}}--}}
{{--        @endif--}}
{{--        <div class="flex pt-2">--}}
{{--            <a href="{{route('dashboard')}}">--}}
{{--                <x-danger-button class="mt-1">--}}
{{--                    Ortga--}}
{{--                </x-danger-button>--}}
{{--            </a>--}}

{{--            <div class="lg:ml-10 ml-10 space-x-8">--}}

{{--                {{$botton}}--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">--}}
{{--            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">--}}
{{--                <table class="min-w-full leading-normal">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th--}}
{{--                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">--}}
{{--                            Sana--}}
{{--                        </th>--}}
{{--                        <th--}}
{{--                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">--}}
{{--                            Summa--}}
{{--                        </th>--}}
{{--                        --}}{{--                        <th--}}
{{--                        --}}{{--                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">--}}
{{--                        --}}{{--                            status--}}
{{--                        --}}{{--                        </th>--}}
{{--                        <th--}}
{{--                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">--}}
{{--                            Sotuvchi--}}
{{--                        </th>--}}
{{--                        <th--}}
{{--                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">--}}
{{--                            qo'shimcha--}}
{{--                        </th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}

{{--                    {{$slot}}--}}
{{--                    </tbody>--}}
{{--                </table>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
