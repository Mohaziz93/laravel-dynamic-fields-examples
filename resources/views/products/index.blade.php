<!DOCTYPE html>

<html>

<head>

    <title>Add/remove multiple input fields dynamically with Jquery Laravel 5.8</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>



<div class="container">

    <h2 align="center">Add/remove multiple input fields dynamically with Jquery Laravel 5.8</h2>


    <table class="table table-bordered" id="dynamicTable">

        <tr>

            <th>Name</th>

            <th>Qty</th>

            <th>Price</th>

            <th>Action</th>

        </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{$product->product['name']}}</td>

                <td>{{$product->product['qty']}}</td>

                <td>{{$product->product['price']}}</td>

                <td>ACTIONS HERE</td>
            </tr>
        @endforeach



    </table>

</div>






</body>

</html>

