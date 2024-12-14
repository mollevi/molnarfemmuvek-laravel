<div class="grid grid-cols-1 lg:grid-cols-1 items-center border border-neutral-700 divide-y lg:divide-y-0 lg:divide-x divide-neutral-700 rounded-xl">
    @foreach($orders as $order)
        <a class="group relative z-10 p-4 overflow-hidden md:p-6 h-full flex flex-col bg-neutral-900 first:rounded-t-xl last:rounded-b-xl lg:first:rounded-l-xl lg:first:rounded-tr-none lg:last:rounded-r-xl lg:last:rounded-bl-none before:absolute before:inset-0 before:bg-gradient-to-b before:hover:from-transparent before:hover:via-transparent before:hover:to-[#ff0]/10 before:via-80% before:-z-[1] before:last:rounded-b-xl lg:before:first:rounded-s-xl lg:before:last:rounded-e-xl lg:before:last:rounded-bl-none before:opacity-0 before:hover:opacity-100"
           href="{{route("order.view",$order)}}">
            <div class="mb-4 overflow-hidden">
                <div class="mt-5 overflow-hidden">
                    <p class="font-semibold overflow-hidden text-white">{{$order->title}}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
