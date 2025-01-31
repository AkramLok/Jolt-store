<div x-data="{ open: false }" x-on:keydown.escape="open = false" x-on:keydown.tab="open = false"
    x-on:keydown.shift.tab="open = false" x-on:search-side-bar-open.window="open = true"
    x-on:search-side-bar-close.window="open = false" x-on:click.outside="open = false" x-show="open" style="display: none"
    class="w-full z-[999] overflow-hidden h-screen  fixed left-0 top-0">

    <aside x-show="open" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="transform translate-y-full" x-transition:enter-end="transform -translate-y-0"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform -translate-y-0"
    x-transition:leave-end="transform translate-y-full"
        class="w-full h-screen z-10 absolute left-0 bottom-0  flex bg-white flex-col gap-4 justify-start items-center p-4">
        <div class="flex md:max-w-[100%] lg:max-w-[78%] flex-col gap-2 justify-start w-full items-center">

        <div class="w-full flex justify-between items-center">
            <p class=" text-primary font-bold flex gap-0 items-center justify-start text-3xl"
            >
                جولت
          </p>
           <button
              x-on:click="open = false"
             class="text-slate-700  p-1"
           >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-x">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M18 6l-12 12" />
            <path d="M6 6l12 12" />
        </svg>
           </button>
        </div>
        <div class="flex  top-0 left-0 bg-white mt-5  w-full gap-3 justify-between items-center">
            <x-input wire:model.live.debounce='search' type="text" placeholder="البحث عن المنتجات" class="w-full" />
        </div>

        <div class="flex flex-col mt-10 w-full justify-start items-start gap-3">
            @foreach ($products as $product)
            <div class="flex w-full justify-start items-start gap-2">
                <img src="{{ asset('storage/' . $product->cover_img) }}" alt="{{$product->name }}"
                class="w-16 h-16 object-cover rounded-md">
            <a
             href="{{ route('products-show-details', $product->slug) }}"
            class="flex flex-col justify-start items-start">
                <h3 class="  text-neutral-600 text-sm font-medium line-clamp-1">
                    {{ $product->name }}
                </h3>
                <p class="text-neutral-700 text-sm">
                     {{ $product->price }} د.م.
                </p>
                </p>
                {{--if hi have a discount --}}
                @if ($product->discounts->count() > 0)
                <span
                class="  overflow-hidden flex justify-start items-center min-w-32  bg-teal-800 text-amber-200 text-xs font-bold px-2 py-0.5">
                {{ $product->discounts->last()->name }}  {{ $product->discounts->last()->value }}% OFF
                </span>
                @endif
            </div>
        </a>
            @endforeach
        </div>
    </div>

    </aside>
</div>
