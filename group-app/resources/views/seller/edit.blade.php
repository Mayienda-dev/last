<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="flex justify-center pt-20">
        <form action="/" method="POST">
            @csrf
            @method('PUT')
            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="name" placeholder="name" value="{{ old('name', $property->name) }}">
            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="county" placeholder="county" value="{{ old('county', $property->county) }}">
            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="size" placeholder="size" value="{{ old('size', $property->size) }}">
            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="description" placeholder="description" value="{{ old('description', $property->description) }}">
            <label for="category_type">Property Category</label><br>
                <select name="category_type" id="category_type">
                    <option value="rent" @if(old('category_type', $property->category_type) === 'rent') selected @endif>Rent</option>
                    <option value="hire" @if(old('category_type', $property->category_type) === 'hire') selected @endif>Hire</option>
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
                            @if(in_array($key, old('tags', $selectedTags))) checked @endif
                        >
                        <label class="form-check-label" for="tag-{{ $key }}">
                            {{ $label }}
                        </label>
                    </div>
                @endforeach
                
            {{-- </div> --}}
            

            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="price" placeholder="enter price" value="{{ old('price', $property->price) }}">
            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="duration" placeholder="duration of hire/rent" value="{{ old('duration', $property->duration) }}">
            {{-- <input 
            type="file"
            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="image" placeholder=""> --}}
            
        </form>
    </div>
                
</body>
</html>