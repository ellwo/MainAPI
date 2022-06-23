<section>
<div class=" relative">



    @if($delete_productid!="no")
    <div class="absolute top-24 right-1/2 flex flex-col bg-primary rounded-full">
        هل انت متاكد من الحذف ؟
        <div class="flex justify-center">
  <x-button  wire:click='delete_pro'>Yes</x-button>
  <x-button  x-on:click="$wire.set('delete_productid','no')" > الغاء</x-button>
        </div>
    </div>
    @endif



<div class="flex flex-col pt-4 items-center justify-center dark:bg-darker">
	<div class="mx-auto w-full flex flex-col  col-span-12">


		<div class="md:flex md:mx-auto space-y-2 items-center lg:w-2/3 space-x-2 justify-between mb-4">
			<div class="w-full pr-4">
				<div class="relative md:w-full">
					<input wire:model.lazy="search" type="search"
						class=" py-2 pl-10 pr-4  w-full font-medium text-gray-600 rounded-lg shadow focus:outline-none focus:shadow-outline"
						placeholder="Search...">
					<div class="absolute top-0 left-0 inline-flex items-center p-2">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
							stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
							stroke-linejoin="round">
							<rect x="0" y="0" width="24" height="24" stroke="none"></rect>
							<circle cx="10" cy="10" r="7" />
							<line x1="21" y1="21" x2="15" y2="15" />
						</svg>
					</div>
                </div>
			</div>
			<div>
				<div class="flex  transition-shadow shadow">
					<div class="relative flex flex-col items-center space-y-2 ">
                        <x-label value="عرض المنتجات حسب "  />
                    <select wire:model.lazy='username' wire:change='UsernameUpdated' class="bg-white text-dark dark:text-white dark:bg-dark rounded-2xl ">
                        <option value="all">جميع الحسابات </option>
                        <option value="useronly">الحساب الشخصي </option>

                        @foreach ($bussinses as $buss)
                        <option wire:click="choseBuss('{{ $buss->username }}')" value="{{ $buss->username }}">{{ $buss->name }}</option>
                        @endforeach

                    </select>

					</div>
				</div>
			</div>
            <div>
				<div  class="flex rounded-lg transition-shadow shadow">
					<div class="w-full flex flex-col items-center space-y-2 ">
                       <x-button class='block w-32' variant="success">
                        اضافة جديد
                        <x-heroicon-o-plus class="w-4 h-4"/>
                       </x-button>
					</div>
				</div>
			</div>
		</div>
		<div class="flex flex-col  md:overflow-x-hidden overflow-x-scroll w-full  mx-auto ">
			<table class="table md:min-w-full text-xs px-4 space-y-6 sm:text-sm border-separate text-dark dark:text-light">
				<thead class=" dark:text-light bg-light dark:bg-dark">
					<tr>
						<th class="p-3">المنتج </th>
						<th class="p-3 text-left">الصفحة</th>
						<th class="p-3 text-left">السعر</th>
						<th class="p-3 text-left">التقييم</th>
						<th class="p-3 text-left">تاريخ </th>
						<th class="p-3 text-left">عمليات</th>
					</tr>
				</thead>
				<tbody class="">

                    @foreach ($products as $product)

					<tr class="bg-white dark:bg-dark">
						<td class="p-3">
							<div class="flex align-items-center">
								<img class="object-cover w-12 h-12 rounded-full" src="{{ $product->img }}" alt="EZ">
								<div class="ml-3">
									<div class="">{{ $product->name }}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
                            @if (get_class($product->owner)=="App\\Models\\User")
                                الرئيسية
                            @else

							{{ $product->owner->name }}
                            @endif
						</td>
						<td class="p-3 font-bold">
							{{ $product->price }}\ر.ي
						</td>
						<td class="p-3">
							<span class="px-2 bg-green-400 rounded-md text-gray-50">available</span>
						</td>

						<td class="p-3">

							{{$product->created_at}}
						</td>
						<td class="p-3 ">
							<a href="#" class="mr-2 text-gray-400 hover:text-dark dark:hover:text-gray-100">
								<i class="text-base material-icons-outlined">visibility</i>
							</a>
							<a href="#" class="mx-2 text-gray-400 hover:text-yellow-700">
								<i class="text-lg text-primary material-icons-outlined">edit</i>
							</a>
							<a wire:click="Setdelete_productid({{  $product->id}})" href="#" class="ml-2 text-danger-light hover:text-danger">
								<i class="text-base material-icons-round">delete_outline</i>
							</a>
						</td>
					</tr>
                    @endforeach
				</tbody>
			</table>
            {{ $products->links() }}
		</div>
	</div>
</div>
<style>
	.table {
		border-spacing: 0 15px;
	}

	i {
		font-size: 1rem !important;
	}

	.table tr {
		border-radius: 20px;
	}

	tr td:nth-child(n+6),
	tr th:nth-child(n+6) {
		border-radius: 0 .625rem .625rem 0;
	}

	tr td:nth-child(1),
	tr th:nth-child(1) {
		border-radius: .625rem 0 0 .625rem;
	}
</style>

<x-slot name="script">


</x-slot>



</div>
</section>
