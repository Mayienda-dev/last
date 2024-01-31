<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <h1>Seller Dashboard</h1>

        @if (auth()->user()->seller)
            @if (count($properties) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $property)
                            <tr>
                                <td>{{ $property->name }}</td>
                                <td>{{ $property->county }}</td>
                                <td>{{ $property->description }}</td>
                                <td>{{ $property->size }}</td>
                                <td>
                                    @if ($property->propertyCategory->rent)
                                        Rent
                                    @elseif ($property->propertyCategory->hire)
                                        Hire
                                    @endif
                                </td>
                                <td>{{ $property->propertyCategory->price }}</td>
                                <td>
                                    <a href="{{ route('seller.edit', ['id' => $property->id]) }}" class="btn btn-primary">Edit</a>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>You have no properties listed.</p>
            @endif
        @else
            <p>You are not a seller.</p>
        @endif
    </div>


</body>
</html>