<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css', 'resources/js/app.js')
    <title>Document</title>
</head>
<body>
    <div class="">
        <h1>Add property</h1>
        <form action='/seller/store' method="POST" enctype="multipart/form-data">
            @csrf
            <div class="">

               
                
                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="name" placeholder="name">
                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="county" placeholder="county">
                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="size" placeholder="size">
                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="description" placeholder="description">
                <label for="category_type">Property category</label><br>
                <select name="category_type" id="category_type">
                    <option value="rent">Rent</option>
                    
                    <option value="hire">Hire</option>
                </select>
                <br>
                {{-- <div class="form-group"> --}}
                    <label>Select Tags</label><br>
                    @foreach ($tags as $key => $label)
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="tags[]"
                                value="{{ $key }}"
                                id="tag-{{ $key }}"
                                @if (in_array($key, $selectedTags)) checked @endif
                            >
                            <label class="form-check-label" for="tag-{{ $key }}">
                                {{ $label }}
                            </label>
                        </div>
                    @endforeach
                {{-- </div> --}}
                

                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="price" placeholder="enter price">
                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="duration" placeholder="duration of hire/rent">
                <input 
                type="file"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="image" placeholder="">
                
                

                <button type= "submit" class="bg-green-500 shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
        
                </button>
    
            </div>
            
        </form>
        
    </div>
</body>
</html>