<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  flex justify-start">
            

            @include('filter')
        </h2>



    </x-slot>

    <div style="display:none" id="myCart">

          @include('cart')

        </div>

@include('movies')


<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

</x-app-layout>
