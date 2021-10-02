<x-app-layout>

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold mb-4">Detalle del pedido:</h1>

        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                    <h1 class="text-lg ml-2">{{ $course->title }}</h1>
                    <p class="text-xl font-bold ml-auto">U$S: {{ $course->price->value }}</p>
                </article>

                <div class="flex justify-end">
                    <a class="btn btn-primary mt-2 mb-4" href="{{ route('payment.pay', $course) }}">Comprar el curso</a>
                </div>

                <hr>
                <p class="text-sm mt-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere blanditiis praesentium quos quaerat corrupti velit cupiditate reprehenderit consectetur illum aliquid! Dolor enim quas voluptatibus magnam aspernatur? Nesciunt dolorem perferendis ipsam?</p><a class="text-red-500 font-bold" href="">Terminos y condiciones</a>


            </div>
        </div>
    </div>

</x-app-layout>