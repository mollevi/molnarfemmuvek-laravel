<x-app-layout>
    @section("title")
        Molnár Fémművek
    @endsection
    @section("main")
        <div class="bg-neutral-900">
            <div class="max-w-5xl px-4 xl:px-0 py-24 mx-auto">

                <div class="max-w-3xl mb-10 lg:mb-14">
                    <h2 class="text-white font-semibold text-2xl md:text-4xl md:leading-tight">
                        {{__('Stories')}}
                    </h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 items-center border border-neutral-700 divide-y lg:divide-y-0 lg:divide-x divide-neutral-700 rounded-xl">
                    @foreach($news as $item)
                        <a class="group relative z-10 p-4 md:p-6 h-full flex flex-col bg-neutral-900 first:rounded-t-xl last:rounded-b-xl lg:first:rounded-l-xl lg:first:rounded-tr-none lg:last:rounded-r-xl lg:last:rounded-bl-none before:absolute before:inset-0 before:bg-gradient-to-b before:hover:from-transparent before:hover:via-transparent before:hover:to-[#ff0]/10 before:via-80% before:-z-[1] before:last:rounded-b-xl lg:before:first:rounded-s-xl lg:before:last:rounded-e-xl lg:before:last:rounded-bl-none before:opacity-0 before:hover:opacity-100"
                           href="{{route("stories.read_more", $item->id)}}">

                            <div class="mb-4">
                                <img src="/storage/{{$item->small_image}}" class="flex-shrink-0" alt="News image">
                                <div class="mt-5">
                                    <p class="font-semibold text-5xl text-white">{{$item->title}}</p>
                                    <h3 class="mt-5 font-medium text-lg text-white">{!! $item->subtitle !!}</h3>
                                    <p class="mt-1 text-neutral-400">{!! $item->teaser !!}</p>
                                </div>
                            </div>
                            <p class="mt-auto">
                                <span class="font-medium text-sm text-[#ff0] pb-1 border-b-2 border-neutral-700 group-hover:border-[#ff0] transition focus:outline-none group-focus:border-[#ff0]">
                                    {{__('menu.read_more')}}
                                </span>
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="bg-neutral-900">
                <div class="max-w-[66rem] px-0 xl:px-0 py-0 mx-auto">
                    <div class="border border-neutral-800 rounded-xl">
                        <div class="p-4 lg:p-8 bg-gradient-to-bl from-neutral-800 via-neutral-900 to-neutral-950 rounded-xl">
                            <div class="grid grid-cols-1 sm:grid-cols-1 items-center gap-y-0 gap-x-72">
                                {{ $news->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
