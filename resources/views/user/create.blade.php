<x-guest-layout>
    <form method="POST" action="{{ route('user.store') }}">
        @csrf
        <input type="hidden" name="old_user_id" value="{{$user->id??''}}">
        <input type="hidden" name="seller_id" value="{{auth()->user()->id??1}}">
        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name??''}}"
                          required autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Telefon raqam')"/>
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                          value="{{$user->phone_number??''}}" required/>
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('qo\'shimcha ma\'lumot')"/>
            <textarea name="description" class="block mt-1 w-full" id="description"
                      rows="3">{{$user->description??''}}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-danger-button>
                <a href="{{route('dashboard')}}">
                    Ortga
                </a>
            </x-danger-button>
            <x-primary-button class="ml-4">
                {{ __('Saqlash') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
