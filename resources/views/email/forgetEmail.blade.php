@component('mail::message')
    <h3 class="SemiB-font text-md">Hello {{ $user->name }}</h3> <br />
    <p class="Reg-font text-[12px]"> We understand that it happen sometimes.</p> <br />
    <p class="Reg-font text-[12px]"> So please Click the Button below to Start reseting your Password.</p><br />

    @component('mail::button', ['url' => url('forgot-password-email/' . $user->remember_token)])
        Reset Your Password
    @endcomponent
    {{-- <x-mail::button :url="'forgot-password-email/' . $user->remember_token">
    </x-mail::button> --}}
    <br />
    <span class="Reg-font">Thanks,</span> <br />
    <span class="Reg-font"> {{ config('app.name') }}</span>
@endcomponent
