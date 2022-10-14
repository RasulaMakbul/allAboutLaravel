    <x-master>
        <x-slot:title>
            {{__('Add Product')}}
        </x-slot:title>
        <x-forms.errors />

        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>{{__('Add Product')}}</h1>
            <form class="form-light">


                <x-forms.input name="productName" class="mt-2" title="Product Name" type="text" id="productName" :value="old('productName')" />
                <x-forms.dropdowns name="categoryID" title="Category" id="category" :dropItems="$categories" required />
                <div class="d-flex">
                    <div class="col-6">
                        <x-forms.input name="color" class="mt-2" title="Color" type="text" id="color" :value="old('color')" />
                    </div>
                    <div class="col-6">
                        <x-forms.input name="brand" class="mt-2" title="Brand" type="text" id="brand" :value="old('brand')" />
                    </div>
                </div>
                <div class="d-flex">
                    <div class="col-6">
                        <x-forms.input name="unitPrice" class="mt-2" title="Unit Price" type="text" id="unitPrice" :value="old('unitPrice')" />
                    </div>
                    <div class="col-6">
                        <x-forms.input name="stock" class="mt-2" title="Unit" type="text" id="stock" :value="old('unit')" />
                    </div>
                </div>

                @php
                $radioUnit=['kg','lb'];
                @endphp
                <x-forms.radiobox name="unit" :radioUnit="$radioUnit" />


                <x-forms.input name=" description" class="mt-2" title="Description" type="text" id="description" :value="old('description')" />
                <x-forms.input name=" image" class="mt-2" title="Product Image" type="file" id="image" />






                <div class="form-group col-8 m-3 mb-5">
                    <button type="submit" class="btn btn-outline-info  m-3">{{__('Save')}}</button>
                    <a type="button" href="{{route('product.index')}}" class="btn btn-outline-secondary">{{__('Back')}}</a>
                </div>


            </form>

    </x-master>