<x-layout>

    <x-setting heading="Manage Posts">

        <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($posts as $post)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    <a href="/posts/{{$post->slug}}">
                                        {{$post->title}}
                                    </a>
                                </div>
                                </div>
                            </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="/admin/posts/{{$post->id}}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                {{-- <a href="#" class="text-gray-500 hover:text-indigo-900">Delete</a> --}}
                                <form action="/admin/posts/{{$post->slug}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-gray-500 hover:text-indigo-900">Delete</button>
                                </form>
                                </td>
                        </tr>
                        @endforeach
                        <!-- More people... -->
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>

            <div class="mt-2">
            {{$posts->links()}}
            </div>

    </x-setting>

        
</x-layout>