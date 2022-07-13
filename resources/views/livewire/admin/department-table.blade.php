<div>

    <div class="flex flex-col">
        <div class="w-full">
            <div dir="ltr">
            {{ $departments->links() }}
            </div>
            <div class="my-4 border-b border-gray-200 shadow">

                <table>
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                ID
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                اسم القسم
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                نوع القسم
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                صورة العرض
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                تاريخ انشاء القسم
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                Edit
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-600">
                        @foreach ( $departments as $c )
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
                                        {{ $c->type ==1?"تجاري":"خدمي"  }}
                                </td>
                                <td class="py-4 text-sm text-center text-gray-500 dark:text-white">

                                        <img src="{{ $c->img }}" class="w-12 h-12 rounded-full"/>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-white">
                                    {{ $c->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('edit_Department',['id'=>$c->id])  }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('delet_Department',['id'=>$c->id])  }}" class="px-4 py-1 text-sm text-white bg-red-400 rounded">
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
