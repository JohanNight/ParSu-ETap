<x-mail::message>

    <h3 class="SemiB-font text-md">Hello {{ $user->name }}</h3> <br />
    <p class="Reg-font text-[12px]"> We understand that it happen sometimes.</p> <br />
    <p class="Reg-font text-[12px]"> So please Click the Button below to Start reseting your Password.</p><br />

    <x-mail::button :url="'forgot-password-email/' . $user->remember_token">
        Reset Password
    </x-mail::button>
    <br />

    Thanks,
    {{ config('app.name') }}

</x-mail::message>
