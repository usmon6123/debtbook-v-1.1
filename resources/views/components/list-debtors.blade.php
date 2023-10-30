<tr>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <div class="flex items-center">

            <div class="flex-shrink-0 w-10 h-10">
                <img class="w-full h-full rounded-full"
                     src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                     alt=""/>
            </div>
            <a href="{{route('debt-list.getId',['id'=>$id])}}">
                {{--            <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>--}}
                <div class="ml-3 flex justify-normal">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{$name}}&nbsp;
                    </p>
                </div>
            </a>
        </div>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">{{$id}}</p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">
            {{$phone_number}}
        </p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-right  text-gray-900 whitespace-no-wrap">
            <b> @if(is_numeric((string)$total))
                    {{ number_format((string) $total, 0, '.', ' ') }}
                @else
                    {{ $total }}
                @endif
            </b>
        </p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">
            {{$description}}
        </p>
    </td>

    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <a href="{{route('debt-list.getId',['id'=>$id])}}">
            <x-secondary-button>
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M344 0H488c13.3 0 24 10.7 24 24V168c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-39-39-87 87c-9.4 9.4-24.6 9.4-33.9 0l-32-32c-9.4-9.4-9.4-24.6 0-33.9l87-87L327 41c-6.9-6.9-8.9-17.2-5.2-26.2S334.3 0 344 0zM168 512H24c-13.3 0-24-10.7-24-24V344c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2l39 39 87-87c9.4-9.4 24.6-9.4 33.9 0l32 32c9.4 9.4 9.4 24.6 0 33.9l-87 87 39 39c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8z"/></svg>
            </x-secondary-button>
        </a>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        {{$edit}}
    </td>
    @if($total == '0')
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            {{$delete}}
        </td>
    @endif
</tr>
