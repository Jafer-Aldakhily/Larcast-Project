<x-panel>
    
<form method="post" action="/posts/{{$post->slug}}/comments">
    @csrf

    <header class="flex items-center">
        <img src="https://i.pravatar.cc/60?u={{auth()->id()}}"
            width="40px" height="40px" alt="" class="rounded-2xl">
        
            <h2 class="ml-4">Want to participate?</h2>
    </header>

    <div class="mt-6">
        <textarea name="body" rows="5" class="w-full text-xs focus:outline-none focus:ring" placeholder="Quick, thing of something to say"></textarea>

        <p class="text-red-500 text-xs">
            @error('body')
            {{$message}}
            @enderror
        </p>
    </div>

    <div class="flex justify-end mt-6 pt-6 border-t border-green-200">

        <x-form.button>Post</x-form.button>
        
    </div>

</form>
                    
</x-panel>