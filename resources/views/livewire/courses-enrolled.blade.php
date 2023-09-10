<section class="card">
    <div class="card-body">
        <div class="flex items-center">
            <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}"
                alt="{{ $course->teacher->name }}">
            <div class="ml-4">
                <h1 class="font-bold text-gray-500 text-lg">
                    Prof. {{ $course->teacher->name }}
                </h1>
                <a class="text-blue-400 text-sm font-bold"
                    href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
            </div>
        </div>

        @can('enrolled', $course)

            <a class="btn btn-danger btn-block mt-4" href="{{ route('courses.status', $course) }}">Continuar
                con el curso</a>
        @else
            @if ($course->price->value == 0)
                <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">GRATIS</p>

                <form action="{{ route('courses.enrolled', $course) }}" method="post">
                    @csrf
                    <button class="btn btn-danger btn-block" type="submit">Llevar este curso</button>
                </form>
            @else
                <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">US$ {{ $course->price->value }}</p>
                <button class="btn btn-primary w-full mb-2"
                    wire:click="add_to_cart"
                    wire:loading.attr="disabled"
                    wire:target="add_to_cart">
                    @if (Cart::instance('shopping')->content()->where('id', $this->course->id)->first())
                        Eliminar del carrito
                    @else
                        Añadir al carrito 
                    @endif
                </button>

                <button class="btn btn-danger btn-block"
                    wire:click="buy_now"
                    wire:loading.attr="disabled"
                    wire:target="buy_now">
                    Comprar este curso
                </button>
            @endif

        @endcan


    </div>
</section>