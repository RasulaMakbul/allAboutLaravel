    <x-master>
        <x-slot:title>
            Trash
        </x-slot:title>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Orders</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

                <a type="button" href="{{route('order.index')}}" class="btn btn-sm btn-outline-secondary">
                    <i class="fa-solid fa-list"></i>
                    Order List
                </a>
            </div>
        </div>

        <div class="container-fluid pt-4 px-4">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Delivery Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $order->productName }}</td>
                        <td>{{ $order->unitPrice }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->unit }}</td>
                        <td>{{ $order->deliveryDate }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="#" class="link-success"><i class="fa-solid fa-eye fs-5 me-3"></i></a>
                            <a href="{{route('order.restore',$order->id)}}" class="link-info"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <a href="{{route('order.delete',$order->id)}}" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a>
                            <form action="{{ route('order.delete', $order->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete')" title="Permanent Delete">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach



                </tbody>
            </table>

        </div>

    </x-master>