<x-app-layout>
    @section("title")
        Molnár Fémművek
    @endsection
    @section("main")
        <div class="bg-neutral-900">
            <div class="max-w-[66rem] px-4 xl:px-0 py-24 mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-1 items-center divide-y lg:divide-y-0 lg:divide-x divide-neutral-700">
                    <div class="mb-4">
                        <img src="/storage/{{$item->large_image}}" class="flex-shrink-0 w-full" alt="News image">
                        <div class="mt-5">
                            <p class="font-semibold text-5xl text-white">{{$item->title}}</p>
                            <h3 class="mt-5 font-medium text-lg text-white">{!! $item->subtitle !!}</h3>
                            <p class="mt-1 text-gray-400-100-100 dark:text-blue-300">{!! $item->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
