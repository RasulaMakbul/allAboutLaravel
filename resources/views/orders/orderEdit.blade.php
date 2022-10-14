    <x-master>
        <x-slot:title>
            Edit Order
        </x-slot:title>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('order.update', $order->id)}}" method="POST">
            @csrf
            @method('patch')
            <h1>Edit Order</h1>
            <form class="form-light">
                <x-forms.input name="productName" class="mt-2" title="Product Name" type="text" id="productName" value=" {{$order->productName}} " />
                <div class="d-flex">
                    <div class="col-6">
                        <x-forms.input name="unitPrice" class="mt-2" title="Unit Price" type="text" id="unitPrice" value=" {{$order->unitPrice}}" />
                    </div>
                    <div class=" col-6">
                        <x-forms.input name="quantity" class="mt-2" title="Quantity" type="text" id="quantity" value=" {{$order->quantity}}" />
                    </div>


                </div>

                @php
                $radioUnit=['kg','lb'];
                $setItemr = array();
                foreach($radioUnit as $key => $item) {
                if ($item == $order->unit) {
                $setItemr[] = $item;
                }
                }
                @endphp
                <x-forms.radiobox name="unit" :radioUnit="$radioUnit" :setItemr="$setItemr" />

                <x-forms.input name=" deliveryDate" class="mt-2" title="Delivery Date" type="date" id="deliveryDate" value="{{ $order->deliveryDate}}" />

                @php
                $dropItems=['processing','Shipped','Delivered','canceled'];
                $setItem = array();
                foreach($dropItems as $key => $item) {
                if ($item == $order->status) {
                $setItem[] = $item;
                }
                }

                @endphp

                <x-forms.dropdowns name="status" :dropItems="$dropItems" :setItem="$setItem" />






                <div class="form-group col-8 m-3 mb-5">
                    <button type="submit" class="btn btn-outline-info  m-3">Update</button>
                    <a type="button" href="{{route('order.index')}}" class="btn btn-outline-secondary">Back</a>
                </div>


            </form>

    </x-master>

    migration alter_categories_table –table=”tableName”