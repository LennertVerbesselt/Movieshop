

      <h2 class="text-lg text-center font-bold m-5">Cart</h2>

        <table class="rounded-t-lg m-5 w-3/4 mx-auto md:px-12 bg-gray-800 text-gray-200">
          <tr class="text-left border-b border-gray-300">
            <th class="px-4 py-3">Title</th>
            <th class="px-4 py-3">Individual Price</th>
            <th class="px-4 py-3">Quantity</th>
            <th class="px-4 py-3">Total Price</th>
            <th class="px-4 py-3">&nbsp;</th>
          </tr>
<?php $totalPrice = 0; ?>
          @if($cart)

          @foreach ($cart as $item)

            <?php
              $movie = $item['movie'];
              $quantity = $item['quantity'];
              $totalPrice += $movie->price * $quantity;
              if($quantity != 0) {
              ?>

                <tr class="bg-gray-700 border-b border-gray-600">
                  <td class="px-4 py-3">{{ $movie->title }}</td>
                  <td class="px-4 py-3">${{ $movie->price }}</td>
                  <td class="px-4 py-3">{{ $quantity }}</td>
                  <td class="px-4 py-3">${{ $movie->price * $quantity }}</td>
                  <td class="px-4 py-3"><button id="{{ $movie->id }}"  onClick="deleteCart(this.id)">Delete</button></td>
                </tr>

          <?php }  ?>

            @endforeach
          @endif

          <tr class="bg-gray-700 border-b border-gray-600">
            <td class="px-4 py-3">&nbsp;</td>
            <td class="px-4 py-3">&nbsp;</td>
            <td class="px-4 py-3">&nbsp;</td>
            <td class="px-4 py-3">&nbsp;</td>
            <td class="px-4 py-3">&nbsp;</td>
          </tr>
          <tr class="bg-gray-700 border-b border-gray-600">
            <td class="px-4 py-3">&nbsp;</td>
            <td class="px-4 py-3">&nbsp;</td>
            <td class="px-4 py-3">Total Price:</td>
            <td class="px-4 py-3">${{ $totalPrice}}</td>
            <td class="px-4 py-3">Checkout</td>
          </tr>
        </table>

  <?php  ?>
