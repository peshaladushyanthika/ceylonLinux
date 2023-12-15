<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Your Page Title</title>

        <!-- Bootstrap CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <style>
            .form-label {
                font-weight: bold;
            }
            .table thead th {
                background-color: green;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <!-- Header -->
            <h2 class="text-center mb-4">PURCHASE ORDER VIEW</h2>

            <!-- Form -->
            <form method="get" action="{{ route('user.order') }}">
                @csrf

                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">REGION</th>
                            <th scope="col">TERRITORY</th>
                            <th scope="col">DISTRIBUTOR</th>
                            <th scope="col">PO NUMBER</th>
                            <th scope="col">DATE</th>
                            <th scope="col">TIME</th>
                            <th scope="col">TOTAL AMOUNT</th>
                            <th scope="col">VIEW PO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($orders as $order)
                            <td>{{$order->region_name}}</td>
                            <td>{{$order->territory_name}}</td>
                            <td>{{$order->distributor_name}}</td>
                            <td>{{$order->po_number}}</td>
                            <td>{{$order->date}}</td>
                            <td>{{$order->time}}</td>
                            <td>{{$order->total_price}}</td>
                            <td>
                                <button type="submit" class="btn btn-primary">VIEW</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>
