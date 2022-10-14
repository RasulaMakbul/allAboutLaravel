    <x-master>
        <x-slot:title>
            Add Order
        </x-slot:title>
        <x-forms.errors />

        <form action="{{route('order.store')}}" method="POST">
            @csrf
            <h1>Add Order</h1>
            <form class="form-light">


                <x-forms.input name="productName" class="mt-2" title="Product Name" type="text" id="productName" />
                <div class="d-flex">
                    <div class="col-6">
                        <x-forms.input name="unitPrice" class="mt-2" title="Unit Price" type="number" id="unitPrice" />
                    </div>
                    <div class="col-6">
                        <x-forms.input name="quantity" class="mt-2" title="Quantity" type="number" id="quantity" />
                    </div>


                </div>

                @php
                $radioUnit=['kg','lb'];
                @endphp
                <x-forms.radiobox name="unit" :radioUnit="$radioUnit" />

                <x-forms.input name=" deliveryDate" class="mt-2" title="Delivery Date" type="date" id="deliveryDate" />

                @php
                $dropItems=['processing','Shipped','Delivered','canceled']
                @endphp

                <x-forms.dropdowns name="status" :dropItems="$dropItems" />




                <div class="form-group col-8 m-3 mb-5">
                    <button type="submit" class="btn btn-outline-info  m-3">Save</button>
                    <a type="button" href="{{route('order.index')}}" class="btn btn-outline-secondary">Back</a>
                </div>


            </form>

    </x-master>