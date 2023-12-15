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
                background-color: gray;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <!-- Header -->
            <h2 class="text-center mb-4">ADD INDIVIDUAL PURCHASE ORDER</h2>

            <!-- Form -->
            <form method="post" action="{{ route('user.dashboard') }}">
                @csrf
                <!-- Dropdowns and Fields -->
                <div class="row mb-3" style="justify-content: center;">
                    <div class="col-md-2">
                        <label for="zone_long_name" class="form-label">Zone</label>
                        <select class="form-select" id="zone_long_name" name="zone_long_name" required>
                            @foreach($zones as $zoneName)
                            <option value="{{ $zoneName }}">{{ $zoneName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="region_name" class="form-label">Region</label>
                        <select class="form-select" id="region_name" name="region_name" required>
                            @foreach($regions as $regionName)
                            <option value="{{ $regionName }}">{{ $regionName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="territory_name" class="form-label">Territory</label>
                        <select class="form-select" id="territory_name" name="territory_name" required>
                            @foreach($territories as $territoryName)
                            <option value="{{ $territoryName }}">{{ $territoryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="distribution_name" class="form-label">Distribution</label>
                        <select class="form-select" id="distribution_name" name="distribution_name" required>
                            @foreach($distributors as $distributorName)
                            <option value="{{ $distributorName }}">{{ $distributorName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3" style="justify-content: center;">
                    <div class="col-md-2">
                        <label for="date" class="form-label">Date</label>
                        <p class="form-control-static">Automatically</p>
                    </div>
                    <div class="col-md-2">
                        <label for="po_number" class="form-label">PO Number</label>
                        <p class="form-control-static">Automatically</p>
                    </div>
                    <div class="col-md-2">
                        <label for="remark" class="form-label">Remark</label>
                        <input type="text" class="form-control" id="remark" name="remark" value="Type" />
                    </div>
                </div>

                <!-- Table -->
                <table class="table" style="margin-top: 100px;">
                    <thead>
                        <tr>
                            <th scope="col">SKU CODE</th>
                            <th scope="col">SKU NAME</th>
                            <th scope="col">UNIT PRICE</th>
                            <th scope="col">AVL QTY</th>
                            <th scope="col">ENTER QTY</th>
                            <th scope="col">UNITS</th>
                            <th scope="col">TOTAL PRICE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SKU001</td>
                            <td>Product A</td>
                            <td>10.00</td>
                            <td>100</td>
                            <td class="col-md-1">
                                <input type="number" class="form-control enterQty" name="enterQty" data-unit-price="10.00" />
                            </td>
                            <td>
                                <span class="units"></span>
                            </td>
                            <td class="col-md-1">
                                <span class="totalPrice"></span>
                                <input type="number" name="totalPrice" class="totalPriceInput" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div style="text-align: center; padding-left: 100px;">
                    <button type="submit" class="btn btn-primary" style="padding-left: 100px; padding-right: 100px;">Add PO</button>
                </div>
            </form>
            <button type="submit" class="btn btn-primary" style="margin-top: 20px;"><a href="{{route('user.order')}}" style="color: white; text-decoration: none;">View Orders</a></button>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!-- Your custom JavaScript -->
        <script>
            $(document).ready(function () {
                // Add input event listener to all elements with class 'enterQty'
                $(".enterQty").on("input", function () {
                    // Get entered quantity and unit price
                    const quantity = parseFloat($(this).val());
                    const unitPrice = parseFloat($(this).data("unit-price"));
                    $(this)
                        .closest("tr")
                        .find(".units")
                        .text(isNaN(quantity) ? 0 : quantity);

                    // Calculate total price and update the corresponding element
                    const totalPrice = (isNaN(quantity) ? 0 : quantity) * unitPrice;
                    $(this).closest("tr").find("input.totalPriceInput").val(totalPrice.toFixed(2));
                    // console.log($(this).closest('tr').find('.totalPriceInput').val(totalPrice.toFixed(2)));
                });
            });
        </script>
    </body>
</html>
