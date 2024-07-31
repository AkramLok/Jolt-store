<div
x-data
x-on:click="$dispatch('side-bar-open')"
wire:poll.100ms
class=" flex justify-center cursor-pointer items-center relative"
href="">
{{--render the span just if he auth--}}
@if (Auth::check())
<span
class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full size-4 flex justify-center items-center  text-xs font-bold">
{{ $count }}
</span>
@endif
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
    <path d="M3.06164 14.4413L3.42688 12.2985C3.85856 9.76583 4.0744 8.49951 4.92914 7.74975C5.78389 7 7.01171 7 9.46734 7H14.5327C16.9883 7 18.2161 7 19.0709 7.74975C19.9256 8.49951 20.1414 9.76583 20.5731 12.2985L20.9384 14.4413C21.5357 17.946 21.8344 19.6983 20.9147 20.8491C19.995 22 18.2959 22 14.8979 22H9.1021C5.70406 22 4.00504 22 3.08533 20.8491C2.16562 19.6983 2.4643 17.946 3.06164 14.4413Z" stroke="currentColor" stroke-width="1.5" />
    <path d="M7.5 9L7.71501 5.98983C7.87559 3.74176 9.7462 2 12 2C14.2538 2 16.1244 3.74176 16.285 5.98983L16.5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
</svg>
</div>
