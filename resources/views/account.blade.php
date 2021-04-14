<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Account Details
        </h2>
    </x-slot>


                    <div class="flex  min-h-screen bg-gray-50 dark:bg-gray-900">



	<div class="container max-w-6xl px-5 mx-auto my-28">
		<div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
			<div class="p-5 bg-white rounded shadow-sm">
				<div class="text-base text-gray-400 ">Username:</div>
				<div class="flex items-center pt-4 pb-4">
					<div class="text-1xl font-bold text-gray-900 ">{{Auth::user()->name}}</div>
				</div>
			</div>
			<div class="p-5 bg-white rounded shadow-sm">
				<div class="text-base text-gray-400 ">E-Mail:</div>
				<div class="flex items-center pt-4 pb-4">
					<div class="text-1xl font-bold text-gray-900 ">{{Auth::user()->email}}</div>
				</div>
			</div>
			<div class="p-5 bg-white rounded shadow-sm">
				<div class="text-base text-gray-400 ">Password:</div>
				<div class="flex items-center pt-4 pb-4">
					<div class="text-1xl font-bold text-gray-900 ">*********</div>
				</div>

        <a href="">
          <x-button class="ml-3" >Change Password</x-button></a>
</div>
			<div class="p-5 bg-white rounded shadow-sm">
				<div class="text-base text-gray-400 ">Delivery Address:</div>
				<div class="flex items-center pt-4 pb-4">
					<div class="text-1xl font-bold text-gray-900 ">@if(Auth::user()->deliveryaddress){{Auth::user()->deliveryaddress}}@else Unkown @endif</div>
				</div>
        <div ><a href="{{route('updatedeliveryaddressform')}}">
        <x-button class="ml-3" >Update Delivery Address</x-button></a>
      </div>

			</div>
		</div>
	</div>
</div>


</x-app-layout>
