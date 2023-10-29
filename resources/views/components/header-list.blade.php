<div class="bg-white p-8 rounded-md w-full">
    <div class=" flex items-center justify-between pb-6">
        <div>
            <h2 class="text-gray-600 font-semibold">Products Oder</h2>
            <span class="text-xs">All products item</span>
        </div>
        <div class="flex items-center justify-between">
            <form action="{{ route('search') }}" method="get">
                <input type="text" name="str" placeholder="Izlash...">
                <button type="submit">Qidirish</button>
            </form>
            <div class="lg:ml-40 ml-10 space-x-8">
                <a href="{{ route('user.create') }}">
                    <button
                        class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                        Yangi Mijoz
                    </button>
                </a>
{{--                <button--}}
{{--                    class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">--}}
{{--                    Create--}}
{{--                </button>--}}
            </div>
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
                            Ism
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            id
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            telefon
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Qarzdorlik
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            ma'lumot
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
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
