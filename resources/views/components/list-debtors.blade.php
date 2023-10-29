<tr>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <div class="flex items-center">

            <div class="flex-shrink-0 w-10 h-10">
                <img class="w-full h-full rounded-full"
                     src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                     alt=""/>
            </div>
            {{--            <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>--}}
            <a href="{{route('debt-list.getId',['id'=>$id])}}">
                <div class="ml-3">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{$name}}
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
            <b>{{$total}}</b>
        </p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">
            {{$description}}
        </p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        {{$edit}}
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        {{$delete}}
    </td>

</tr>
