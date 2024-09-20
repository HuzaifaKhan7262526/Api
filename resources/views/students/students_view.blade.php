<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>



    <div class="relative overflow  sm:rounded-lg mx-10 mt-10 px-60">
        <h1 class="text-center text-2xl text-white bg-gray-700 overflowoverflow max-w-64 mb-2">Check Enter Data</h1>
        <table class=" text-sm overflow text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($student as $data)
                    <tr
                        class="overflow odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $data->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->phone_number }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->address }}
                        </td>
                        <td class="px-6 py-4 flex gap-4">
                            <a href="{{ route('student.edit', $data->id) }}"
                                class="font-medium text-gray-800 hover:underline">Edit</a>
                            <form action="{{route('student.delete', $data->id)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="font-medium text-red-600 ">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


</body>

</html>
