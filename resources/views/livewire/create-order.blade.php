<div class="w-full grid grid-cols-2 md:grid-cols-4 mt-10 gap-3">
    <div class="flex flex-col gap-2 col-span-2 justify-start items-start">
        {{-- عرض أول عنصر في الطلب --}}
        <div class="w-full">
            <h2 class="text-lg font-semibold text-slate-600">تفاصيل الطلب</h2>
            <div class="flex gap-2 mt-4">
                <img src="{{ asset('storage/' . $cartItems[0]->product->cover_img) }}" alt="صورة المنتج"
                    class="w-20 h-20 object-cover rounded-md">
                <div class="flex flex-col gap-2">
                    <h3 class="text-lg font-semibold text-slate-800">{{ $cartItems[0]->product->name }}</h3>
                    <p class="text-slate-600 line-clamp-2">{{ $cartItems[0]->product->description }}</p>
                    <p class="text-lg font-semibold text-slate-800">{{ $cartItems[0]->product->price }} درهم</p>
                </div>
            </div>
        </div>
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-slate-600 mb-4">ملخص الطلب</h3>
            <ul class="list-disc pl-5 space-y-2 text-slate-600">
                @foreach ($cartItems as $item)
                    <li>{{ $item->product->name }} - {{ $item->quantity }} × {{ $item->product->price }} درهم</li>
                @endforeach
            </ul>
            <p class="text-lg font-semibold text-slate-600 mt-4">الإجمالي: {{ $total }} درهم</p>
        </div>
    </div>
    <div class="col-span-2  bg-white">
        <h2 class="text-lg font-semibold text-slate-600">معلومات الشحن</h2>
        <p class="text-slate-600">راجع تفاصيل طلبك وقدم المعلومات اللازمة لإكمال عملية الشراء.</p>
        <form
         class="border-r flex flex-col gap-4 pb-3 justify-start items-start border-slate-400/35 px-2" wire:submit.prevent="createOrder()"
        >

            <div class="flex w-full gap-2 mt-5  justify-start items-center">
                <div class="w-1/2">
                    <x-label for="firstname" class="text-slate-700">
                        الاسم الأول
                    </x-label>
                    <x-input wire:model="firstname" type="text"
                        class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="أدخل اسمك الأول" name="firstname" type="text" />

                    @error('firstname')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-1/2">
                    <x-label for="lastname" class="text-slate-700">
                        الاسم الأخير
                    </x-label>
                    <x-input wire:model="lastname" type="text"
                        class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="أدخل اسمك الأخير" name="lastname" type="text" />
                    @error('lastname')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class=" w-full">
                <x-label for="phone" class="text-slate-700">
                    رقم الهاتف
                </x-label>
                <x-input wire:model="phone" type="text"
                    class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="أدخل رقم هاتفك" name="phone" type="text" />
                @error('phone')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex w-full gap-2 justify-start items-center">
                <div class="w-1/2">
                    <x-label for="city" class="text-slate-700">
                        المدينة
                    </x-label>
                    <x-input wire:model="city" type="text"
                        class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="أدخل اسم مدينتك" name="city" type="text" />

                    @error('city')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-1/2">
                    <x-label for="zipCode" class="text-slate-700">
                        الرمز البريدي
                    </x-label>
                    <x-input wire:model="zipCode" type="text"
                        class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="أدخل الرمز البريدي لمدينتك" name="zip_code" type="text" />
                    @error('zipCode')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-4 w-full">
                <x-label for="address" class="text-slate-700">
                    العنوان
                </x-label>
                <x-input wire:model="address" as="textarea"
                    class="flex w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="أدخل عنوانك" name="address" type="text" />
                @error('address')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 px-4 bg-primary text-white font-semibold rounded-md shadow-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                تقديم الطلب
            </button>
        </form>
    </div>
</div>
