<x-button wire:click="addToCart({{ $product->id }})"
    class="default font-bold w-1/2  flex gap-x-2 justify-center items-center">
    <div wire:loading class="flex gap-x-2 justify-center items-center">
        <div
        class="animate-spin inline-block size-4 border-[2px] border-current border-t-transparent text-amber-200 rounded-full dark:text-amber-200" role="status" aria-label="loading">
        </div>
        Adding to Cart ...
    </div>
    <div wire:loading.remove class="flex gap-x-2 justify-center items-center">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none">
            <path
                d="M19.5 11.5C18.4791 8.47991 17.2039 7.5 13.4291 7.5H9.65019C5.74529 7.5 4.23479 8.48796 3.1549 12.2373C2.18223 15.6144 1.6959 17.3029 2.20436 18.6124C2.51576 19.4143 3.06862 20.1097 3.79294 20.6104C5.24007 21.6109 8.98007 22.084 12.5 21.9878"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M7 8V6.36364C7 3.95367 9.01472 2 11.5 2C13.9853 2 16 3.95367 16 6.36364V8" stroke="currentColor"
                stroke-width="1.5" />
            <path d="M14 18H22M18 22L18 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M10.5 11H12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>
        Add To Cart
    </div>
</x-button>
