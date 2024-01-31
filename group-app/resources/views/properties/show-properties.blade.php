<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container mx-auto p-4">
        <div class="md:flex md:justify-between">
            <div class="md:w-1/2 p-4 md:p-0">
                <img 
                    src="{{ asset('images/' . $property->image_path) }}"
                    class="w-full mb-8 shadow-xl"
                    alt="">
            </div>
            <div class="md:w-1/2">
                <h1 class="text-5xl uppercase font-bold">{{ $property->county }}</h1>
                <div class="py-4 text-center">
                    <span class="uppercase text-blue-500 font-bold text-xs italic">
                        Seller: {{ $property->seller->user->name }}
                    </span>
                    <span class="uppercase text-blue-500 font-bold text-xs italic">
                        Phone Number: {{ $property->seller->user->phonenumber }}
                    </span>
                    <span class="uppercase text-blue-500 font-bold text-xs italic">
                        County {{ $property->county }}
                    </span>
                    <p class="text-lg text-gray-700 py-6">
                        Description: {{ $property->description }}
                    </p>
                    <p class="text-lg text-gray-700 py-6">
                        Category: {{ $property->propertyCategory->rent ? 'Rent' : 'Hire' }}
                    </p>
                    <p class="text-lg text-gray-700 py-6">
                        Price: {{ $property->propertyCategory->price }}
                    </p>
                    <p class="text-lg text-gray-700 py-6">
                        Subscription duration: {{ $property->propertyCategory->duration }}
                    </p>
                    <p class="text-lg text-gray-700 py-6">
                        Size: {{ $property->size }}
                    </p>
                    <p class="text-lg text-gray-700 py-6">
                        Tags:
                        @foreach ($property->propertyCategory->tags as $tag)
                            {{ $tag->tags }}
                            @if(!$loop->last), @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-8">
    </div>
    
    
    
     

    
        
        
   
    
    <!-- Add other property information as needed -->



</body>
</html>