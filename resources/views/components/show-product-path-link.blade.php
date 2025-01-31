@props(['product'])
<nav class="flex gap-1 justify-start items-center line-clamp-1 truncate font-medium group  transition-all ease-in-out duration-300">
    <a href="{{ route('home') }}" class="text-sm text-teal-700 group-hover:text-teal-700">الصفحة الرئيسية</a>
    <span class="text-sm text-slate-500">/</span>
    {{-- الفئة --}}
    <a href="{{ route('products-index') }}" class="text-sm text-slate-500 hover:text-slate-700">المنتجات</a>
    <span class="text-sm text-slate-500">/</span>
    <span class="text-sm text-slate-500">{{ $product->name }}</span>
</nav>
