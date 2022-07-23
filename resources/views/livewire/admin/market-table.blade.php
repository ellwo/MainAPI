<div>
<div class="w-full mx-auto overflow-x-scroll text-center lg:mx-4 lg:justify-center lg:flex">
                    <div class="flex-col lg:flex">
                        <div class="w-full">
                        <div dir="ltr">
                            {{ $marcket->links() }}
                        </div>
                            <div class="my-8 border-b border-gray-200 shadow">
                                <table>
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                                ID
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                               اسم السوق
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                                المدينة
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                                تعديل
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                                حذف
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-600">
                                        @foreach ( $marcket as $c )
                                            <tr class="whitespace-nowrap">
                                                <td class="px-6 py-4 text-sm text-center text-gray-500 dark:text-white ">
                                                    {{ $c->id }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-center text-gray-900 dark:text-white">
                                                        {{ $c->name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-sm text-center text-gray-500 dark:text-white">
                                                        {{ $c->city!=null?$c->city->name:""}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="{{ route('edit_markts',['id'=>$c->id])  }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="{{ route('delet_markts',['id'=>$c->id])  }}" class="px-4 py-1 text-sm text-white bg-red-400 rounded">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</div>
