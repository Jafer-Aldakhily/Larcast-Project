<x-layout>

    <section class="px-6 py-8 mt-10">

        <main class="max-w-lg mx-auto bg-gray-300 border border-gray-200 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">Register!</h1>
            
            <form method="post" action="/register" class="mt-10">

                @csrf

                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >name
                </label>

                    <input 
                    type="text"
                    class="border border-gray-400 p-2 w-full" 
                    name="name"
                    id="name"
                    value="{{old('name')}}"
                    required />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">username</label>
                    <input type="text" 
                    class="border border-gray-400 p-2 w-full"
                    name="username"
                    id="username"
                    value="{{old('username')}}"
                    required />

                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-sm text-gray-700">
                        email
                    </label>
                    <input type="text"
                    class="border border-gray-400 p-2 w-full"
                    name="email"
                    id="email"
                    value="{{old('email')}}"
                    required
                    >

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">password</label>
                    <input type="password"
                    class="border border-gray-400 p-2 w-full" 
                    name="password"
                    id="password"
                    required />

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
                </div>

            </form>

        </main>


</section>


</x-layout>