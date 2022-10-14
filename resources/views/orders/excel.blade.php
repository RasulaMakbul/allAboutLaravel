<style>
    .table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .table td,
    .table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tr:hover {
        background-color: #ddd;
    }

    .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Delivery Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $key=>$order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->productName }}</td>
                <td>{{ $order->unitPrice }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->unit }}</td>
                <td>{{ $order->deliveryDate }}</td>
                <td>{{ $order->status }}</td>
            </tr>
            @endforeach



        </tbody>
    </table>