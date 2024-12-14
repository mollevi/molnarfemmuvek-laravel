<x-app-layout>
    @section("title")
        Molnár Fémművek
    @endsection

    @section("main")
        <div class="bg-neutral-900">
            <div class="max-w-5xl px-4 xl:px-0 py-24 mx-auto">

                <div class="max-w-3xl mb-10 lg:mb-14">
                    <h2 class="text-white font-semibold text-2xl md:text-4xl md:leading-tight">
                        {{__('Order')}}
                    </h2>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-1 items-center border border-neutral-700 divide-y lg:divide-y-0 lg:divide-x divide-neutral-700 rounded-xl">
                    <div class="mb-4 overflow-hidden">
                        <div class="mt-5 overflow-hidden">
                            <p class="font-semibold overflow-hidden text-white">{{$order->title}}</p>
                        </div>
                        <div class="mt-5 overflow-hidden">
                            <p class="font-semibold overflow-hidden text-white">{!! $order->text !!}</p>
                        </div>
                    </div>
            </div>
                <livewire:order-view :orderId="$order->id"/>
                <div class="messages-section mt-4">
                    <h3 class="text-lg text-white font-medium mb-2">{{__("Messages")}}</h3>
                    <livewire:lazy-messages :orderId="$order->id" />
                </div>
        </div>
    @endsection
</x-app-layout>
