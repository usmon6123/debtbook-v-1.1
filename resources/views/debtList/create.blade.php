{{--<form action="{{ route('debtbook.store') }}" method="post">--}}
{{--    @csrf--}}
{{--    <label for="select1">to'lov turi:</label>--}}
{{--    <select name="select" id="select1">--}}
{{--        <option value='true'>Qarz olish</option>--}}
{{--        <option value="false">Qarz to'lash</option>--}}
{{--    </select>--}}


{{--    <button type="submit">Jo'natish</button>--}}
{{--</form>--}}

<x-app-layout>
    <div class="font-manrope flex h-screen w-full items-center justify-center">
        <div class="mx-auto box-border w-[365px] border bg-white p-4">
            <div class="flex items-center justify-between">
                <span class="text-[#64748B]">Amaliyot</span>
                <a href="{{route('dashboard')}}">
                <div class="cursor-pointer border rounded-[4px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#64748B]" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                </a>
            </div>

            <form action="{{ route('debtbook.store') }}" method="post">
                @csrf
                <input type="hidden" name="debtor_id" value="{{$debtor_id}}">
                <input type="hidden" name="seller_id" value="{{$seller_id}}">
                <div class="mt-6">
                    <div class="font-semibold">Summani kiriting</div>
                    <input name="debt_sum" class="mt-1 w-full rounded-[4px] border border-[#A0ABBB] p-2"
                           placeholder="20000" required type="number"/>
                </div>

                <div class="mt-6">
                    <x-checkbox2></x-checkbox2>
                </div>

                <div class="mt-6">
                    <div class="font-semibold">Amaliyot turi</div>
                    <div class="mt-2">
                        <select name="in_or_out" class="flex w-full items-center justify-between bg-neutral-100 p-3 rounded-[4px]">

                            <option value='1'>Qarz olyapdi</option>
                            <option value="0">Qarz to'layapdi</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="">Qo'shimcha ma'lumot</div>
                    <textarea name="description"  class="mt-1 w-full rounded-[4px] border border-[#A0ABBB] p-2" placeholder='yozish majburiymas'></textarea>

                </div>

                <div class="mt-6">
                    <div class="flex items-center gap-x-[10px] bg-neutral-100 p-3 mt-2 rounded-[4px]">
                        <img class="h-10 w-10 rounded-full"
                             src="https://images.unsplash.com/photo-1507019403270-cca502add9f8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                             alt=""/>
                        <div>
                            <div class="font-semibold">{{$debtor_name}}</div>
                            <div class="text-[#64748B]">code: {{$debtor_id}}</div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                            class="w-full cursor-pointer rounded-[4px] bg-green-700 px-3 py-[6px] text-center font-semibold text-white">
                        Saqlash
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
<script>
    const rippleCheckboxes = document.querySelectorAll('input[name="ripple"]');

    rippleCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                const rippleValue = checkbox.value;
                alert(`Ripple Effect qiymati: ${rippleValue}`);
            }
        });
    });
</script>
