<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 m-auto">
                <input type="text" id="search" class="form-control" placeholder="Search anything here!">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 m-auto">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody id="alldata">
                        @forelse ($products as $index=>$product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->email }}</td>
                            <td>{{ $product->phone }}</td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                    <tbody id="searchData"></tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        $('#search').on('keyup', function(){
            $value = $(this).val();
            if($value){
                $('#alldata').hide();
                $('#searchData').show();
            }else{
                $('#alldata').show();
                $('#searchData').hide();
            }
            $.ajax({
                type:"GET",
                url: '/searching',
                data:{'search':$value},
                success:function(data){
                    $('#searchData').html(data);
                },
            });
        });

    </script>
</body>
</html>
