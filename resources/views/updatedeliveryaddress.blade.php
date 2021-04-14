<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('updatedeliveryaddress') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <h2>New Delivery Address </h2>
                <x-input id="user_id" class="hidden" type="text" name="user_id" value="{{Auth::user()->id}}" />

                <x-input id="deliveryaddress" class="block mt-1 w-full" type="text" name="deliveryaddress" value="{{Auth::user()->deliveryaddress}}" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    {{ __('Update Delivery Address') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
