<div>
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div dir="ltr">
                    {{ $city->links() }}
                </div>
                <div class="border-b border-gray-200 shadow my-8">
                    <table>
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                    ID
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                    Citys
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                    Country_Id
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                    Created_at
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500 dark:text-white">
                                    Updated_at
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
                            @foreach ( $city as $c )
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-center text-gray-500 dark:text-white ">
                                        {{ $c->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-center text-gray-900 dark:text-white">
                                            {{ $c->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500 text-center dark:text-white">
                                            {{ $c->country->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-white">
                                        {{ $c->created_at }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-white">
                                        {{ $c->updated_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('edit',['id'=>$c->id])  }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('delet',['id'=>$c->id])  }}" class="px-4 py-1 text-sm text-white bg-red-400 rounded">
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
