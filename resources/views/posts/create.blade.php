<x-layout>

    <x-setting heading="Publish New Post">

        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            
            @csrf
    
            <x-form.input name="title" />
    
            <x-form.input name="slug" />
    
            <x-form.input name="thumbnail" type="file" />
    
            <x-form.textarea name="excerpt" />
    
    
            <x-form.textarea name="body"
             />
    
             <x-form.field>
                <x-form.label name="category_id" />
    
                @php
                    $categories = App\Models\Category::all();
                @endphp
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ucwords($category->name)}}</option>                        
                    @endforeach
                </select>
    
                <x-form.error name="error" />
    
             </x-form.field>
    
             <x-form.field>
            <x-form.button>Publish</x-form.button>
             </x-form.field>
        </form>

    </x-setting>

        
</x-layout>