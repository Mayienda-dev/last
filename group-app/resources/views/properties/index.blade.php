<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    @vite('resources/css/app.css', 'resources/js/app.js')
    <title>Document</title>
</head>
<body>
    <div class="pt-10">
        @if (auth()->check())
            @if (auth()->user()->seller)
                <a href="{{ route('seller') }}">Go to Seller Dashboard</a>
            @elseif (auth()->user()->isAdmin()) {{-- Assuming you have an isAdmin() method in your User model --}}
                <a href="{{ route('admin') }}">Go to Admin Dashboard</a>
            @else
                <a href="{{ route('account') }}">Enlist property with us</a>
            @endif
        @else
            <a href="{{ route('login') }}">Login</a>
        @endif
    </div>
    
    
    <div class="p-4 bg-gray-200">
        <div class="flex items-center justify-between">
            <form action="{{ route('filter') }} " method="GET" class="flex space-x-4">
                <!-- Filter Type Dropdown -->
                <div class="flex items-center">
                    <label for="filter_type" class="mr-2">Filter By:</label>
                    <select name="filter_type" id="filter_type" class="px-2 py-1 border rounded">
                        <option value="category">Category(rent,hire)</option>
                        <option value="tags">Tags(commercial, agricultural, weddings)</option>
                        <option value="price">Price</option>
                        <option value="county">County</option>
                    </select>
                </div>
    
                <!-- Filter Input -->
                <div class="flex items-center">
                    <label for="filter_value" class="mr-2">Filter Value:</label>
                    <input type="text" name="filter_value" id="filter_value" placeholder="Enter filter value" class="px-2 py-1 border rounded">
                </div>
    
                <!-- Submit Button -->
                <div class="flex items-center">
                    
                    <button type="button" onclick="filterProperties()">Search</button>
                    
                </div>
            </form>
        </div>
    </div>
    <div id="filtered_results">
        <!-- Filtered results will be displayed here -->
    </div>
    
    <div class="flex m-2">
            @foreach ($properties as $property)
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
            <div class="p-2">
                <div class="card">
                    <div class="img relative">
                        <img src="{{ asset('images/' . $property->image_path) }}" alt="">
                        <div class="image-text-right">
                            <p class="text-lg text-gray-700 py-6">
                                @if ($property->propertyCategory->rent)
                                    Category: Rent
                                @elseif ($property->propertyCategory->hire)
                                    Category: Hire
                                @endif
                            </p>
                        </div>
                        <div class="image-text-left">
                            <a href="/properties/show/{{$property->id}}">view property</a>
                        </div>
                        <div class="image-text-bottom-left">
                            <p class="text-lg text-gray-700 py-6">
                                Price: {{ $property->propertyCategory->price }}
                            </p>
                        </div>
                    </div>
                    <div class="main_text px-3">
                        <h4 class="py-2">{{ $property->name }}</h4>
                        <h6>{{ $property->county }}</h6>
                        <div class="d-flex align-items-center py-2">
                            <i class="bi bi-rulers" style="vertical-align: middle;"></i>
                            <p style="margin-bottom: 0; vertical-align: middle;">{{ $property->size }}</p>
                            <div class="icons border-top d-flex justify-content-between py-2">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <p class="mb-0">{{ $property->seller->user->name }}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-paperclip"></i>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
    
          
          
          
          

         
          <hr class="mt-4 mb-8">
        </div>
        @endforeach 
        
        {{ $properties->links() }}
      </div>

      
</body>
<script>
    function filterProperties() {
        var filterValue = document.getElementById('filter_value').value;

        // Send an AJAX request to the server to filter properties
        $.get( {{ route('filter') }}, { filter_value: filterValue }, function(data) {
            // Update the page with the filtered results
            $('#filtered_results').html(data);
        });
    }
  </script>


</html>


