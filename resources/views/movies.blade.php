<div onload="filterByGenres();" id="movie_overview">

<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

@if ($movies->count())
  @foreach ($movies as $movie)

    <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/5">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg">

                <a href="#">
                    <img alt="Placeholder" class="block h-auto w-full" src="{{ $movie->poster }}">
                </a>

                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            {{ $movie->title }}
                        </a>
                    </h1>
                    <p class="text-grey-darker text-sm">
                        ${{ $movie->price }}
                    </p>
                </header>

                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                    <a class="flex items-center no-underline hover:underline text-black" href="#">

                        <p class="ml-2 text-sm">
                            {{ $movie->genre }}
                        </p>
                    </a>
                      <a  class="no-underline text-grey-darker hover:text-red-dark">
                        <button id="{{ $movie->id }}"  onClick="addCart(this.id)">Add to Cart</button>
                    </a>
                </footer>

            </article>
            <!-- END Article -->

        </div>
        <!-- END Column -->


  @endforeach

@else
  <p>No movies available!</p>
@endif

</div>
</div>
</div>
