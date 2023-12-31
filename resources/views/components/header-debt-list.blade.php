<div class="bg-white p-8 rounded-md w-full">
    <div class=" flex items-center justify-between pb-6">
        <div>
            <h2 class="text-gray-600 font-semibold">Ismi:{{$name}}</h2>
            <h3>Jami:{{number_format((string) $total, 0, '.', ' ')}} so'm</h3>
        </div>
        @if($total == '0'){{$clearButton}} @endif
        <div class="flex pt-2">


            <div class="lg:ml-10 ml-10 space-x-8">

               {{$botton}}

            </div>
            <a href="{{route('dashboard')}}" class="ml-3">
                <x-danger-button class="mt-1">
                    Ortga
                </x-danger-button>
            </a>
        </div>
    </div>
    <div>
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
                            Summa
                        </th>
                        {{--                        <th--}}
                        {{--                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">--}}
                        {{--                            status--}}
                        {{--                        </th>--}}
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

                    {{$slot}}
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
