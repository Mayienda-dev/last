<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>profile</h1>
    <div class="w-5/6 py-10">
        @if (auth()->check())
            @if (auth()->user()->seller) <!-- Check if the authenticated user has a seller -->
                <span class="uppercase text-blue-500 font-bold text-xs italic">
                    Name: {{ auth()->user()->name }}
                </span>
                <span class="uppercase text-blue-500 font-bold text-xs italic">
                    Email: {{ auth()->user()->email }}
                </span>
                <span class="uppercase text-blue-500 font-bold text-xs italic">
                    Phone Number: {{ auth()->user()->phonenumber }}
                </span>
            @endif
        @endif
        
        {{-- Enlist property --}}

        
        <div class="">
            <a href="{{ route('enlist') }}">
                Enlist property
            </a>
        </div>
        <div class="">
            <a href="{{ route('seller.properties') }}">
                view your properties
            </a>
        </div>


        
    
      

    

    
        
    
    </div>
</body>
</html>