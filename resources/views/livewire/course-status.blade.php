<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                @isset($current->iframe)
                {!! $current->iframe !!}
                @else
                <iframe width="560" height="315" src="https://www.youtube.com/embed/nnuhgPkN64o"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                @endisset
            </div>
            <h1 class="text-3xl text-gray-600 font-bold mt-4">{{ $current->name }}</h1>
            @if ($current->description)
            <div class="text-gray-600">
                {{ $current->description->name }}
            </div>
            @endif
            <div class="flex justify-between mt-4">
                <div class="flex items-center cursor-pointer " wire:click="completed">
                    @if ($current->completed)
                    <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                    <p class="text-sm ml-2">unidad culminada</p>
                    @else
                    <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                    <p class="text-sm ml-2">marcar esta unidad como culminada</p>
                    @endif
                </div>
                @if ($current->resource)
                <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                    <i class="fas fa-download text-gray-600 mr-2 text-lg"></i>
                    <p class="text-sm ml-2">Descargar Recurso</p>
                </div>
                @else
                @endif
            </div>
            {{-- <p>INDICE {{ $this->index }}</p>
            <p>PREVIOS @if ($this->previous)
                {{ $this->previous->id }}
                @endif
            </p>
            <p>NEXT @if ($this->next)
                {{ $this->next->id }}
                @endif
            </p> --}}
            <div class="card mt-2">
                <div class="card-body flex">
                    @if ($this->previous)
                    <a wire:click="changeLesson({{ $this->previous }})" class=" cursor-pointer ">Tema Anterior</a>
                    @endif
                    @if ($this->next)
                    <a wire:click="changeLesson({{ $this->next }})" class="ml-auto cursor-pointer">Siguiente
                        Tema</a>
                    @endif

                </div>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded overflow-hidden ">
            <div class="px-6 py-4">

                <h1 class="text-2xl leading-8 text-center mb-4"><a href="{{ route('courses.show', $course) }}"
                        class=" cursor-pointer">{{ $course->title }}</a></h1>
                <div class="flex items-center mb-4">
                    

                    <a class="flex items-center btn bg-green-500 w-60 mb-2 text-white mr-4 text-center"
                        href="{{ route('courses.status', $course) }}">Unirse al Grupo

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="currentColor"
                            style="color: #ffffff" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                    </a>
                </div>


                <div class="inline-flex rounded-md shadow-sm mb-4" role="group">
               
                    
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2" />
                        </svg>
                        Contactar
                    </button>
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                            <path
                                d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                        </svg>
                        Unirse al Grupo
                    </button>
                </div>

                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4"
                            src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>
                    <div>
                        <p>{{ $course->teacher->name }}</p>
                        <a class="text-blue-500 text-sm" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mt-2">{{ $this->advance . '%' }} Completado</p>
                <div class=" relative pt-1">
                    <div class="overflw-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div style="width: {{ $this->advance . '%' }}"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500">
                        </div>
                    </div>
                </div>
                <ul>
                    @foreach ($course->sections as $section)
                    <li class="text-gray-600 mb-4">
                        <a class="font-bold text-base inline-block mb-2" class="font-bold" href="">{{ $section->name
                            }}</a>
                        <ul>
                            @foreach ($section->lessons as $lesson)
                            <li class="flex">
                                <div>
                                    @if ($lesson->completed)
                                    @if ($current->id == $lesson->id)
                                    <span
                                        class=" inline-block w-4 h-4 border-4 border-blue-500  mt-1 rounded-full mr-2"></span>
                                    @else
                                    <span class=" inline-block w-4 h-4 bg-blue-500  mt-1 rounded-full mr-2"></span>
                                    @endif
                                    @else
                                    @if ($current->id == $lesson->id)
                                    <span
                                        class=" inline-block w-4 h-4 border-4 border-gray-500  mt-1 rounded-full mr-2"></span>
                                    @else
                                    <span class=" inline-block w-4 h-4 bg-gray-500 mt-1 rounded-full mr-2"></span>
                                    @endif
                                    @endif

                                </div>
                                <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})">{{ $lesson->name }}

                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>
</div>