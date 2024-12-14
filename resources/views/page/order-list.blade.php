<x-app-layout>
    @section("title")
        Molnár Fémművek
    @endsection

    @section("main")
        <div class="bg-neutral-900">
            <div class="max-w-5xl px-4 xl:px-0 py-24 mx-auto">

                <div class="max-w-3xl mb-10 lg:mb-14">
                    <h2 class="text-white font-semibold text-2xl md:text-4xl md:leading-tight">
                        {{__('Orders')}}
                    </h2>
                </div>
                <livewire:order-list/>
            </div>
        </div>
    @endsection
</x-app-layout>
