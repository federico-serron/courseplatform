@props(['course'])

<article class="bg-white shadow-xl rounded-lg overflow-hidden">
    <img class = "h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
    <div class="px-6 py-4">
        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{Str::limit( $course->title, 40) }}<h1>
        <p class="text-gray-700 mb-2 mt-3 text-right">Prof: {{ $course->teacher->name }}</p>
        <div class="flex">
            <ul = class="flex text-sm">
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow' : 'gray'}}-400"></i>
                </li>
            </ul>

            <p class="text-sm text-gray-300 ml-auto">
                <i class="fas fa-users"></i>
                ({{ $course->student_count }})
            </p>
        </div>
        <a href="{{ route('courses.show', $course) }}" class="block mt-4 w-full bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 border-b-4 border-blue-900 hover:border-blue rounded text-center" >Ver curso</a>
    </div>
</article>