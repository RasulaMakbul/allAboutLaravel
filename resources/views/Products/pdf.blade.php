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
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>{{__('Product Name')}}</th>
            <th>{{__('Category Name')}}</th>
            <th>{{__('Unit Price')}}</th>
            <th>{{__('Stock')}}</th>
            <th>{{__('Unit')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->productName }}</td>
            <td>{{ $product->categoryName }}</td>
            <td>{{ $product->unitPrice }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->unit }}</td>
        </tr>

        <!-- <img src="{{asset('storage/categories/'.$product->image)}}" alt=""> -->
        @endforeach



    </tbody>
</table>