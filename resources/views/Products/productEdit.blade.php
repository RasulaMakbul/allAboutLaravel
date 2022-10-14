    <x-master>
        <x-slot:title>
            {{__('Edit Product')}}
        </x-slot:title>
        <x-forms.errors />

        <form action="{{route('product.update',$product->id)}}" method="POST">
            @csrf
            @method('patch')
            <h1>{{__('Edit Product')}}</h1>
            <form class="form-light">


                <x-forms.input name="productName" class="mt-2" title="Product Name" type="text" id="productName" :value="old('productName',$product->productName)" />


                <x-forms.dropdowns name="categoryID" title="Category" id="category" :dropItems="$categories" :setItem="old('categoryID',$product->categoryID)" />


                <div class=" d-flex">
                    <div class="col-6">
                        <x-forms.input name="color" class="mt-2" title="Color" type="text" id="color" :value="old('color',$product->color)" />
                    </div>
                    <div class="col-6">
                        <x-forms.input name="brand" class="mt-2" title="Brand" type="text" id="brand" :value="old('brand',$product->brand)" />
                    </div>
                </div>
                <div class=" d-flex">
                    <div class="col-6">
                        <x-forms.input name="unitPrice" class="mt-2" title="Unit Price" type="text" id="unitPrice" :value="old('unitPrice',$product->unitPrice)" />
                    </div>
                    <div class="col-6">
                        <x-forms.input name="stock" class="mt-2" title="Unit" type="text" id="stock" :value="old('stock',$product->stock)" />
                    </div>
                </div>

                @php
                $radioUnit=['kg','lb'];
                $setItemr = array();
                foreach($radioUnit as $key => $item) {
                if ($item == $product->unit) {
                $setItemr[] = $item;
                }
                }
                @endphp
                <x-forms.radiobox name="unit" :radioUnit="$radioUnit" :setItemr="$setItemr" />
                <x-forms.input type="file" name="image" class="mt-2" title="Product Image" id="image" :value="$product->image" />

                <x-forms.input name=" description" class="mt-2" title="Description" type="text" id="description" :value="old('description',$product->description)" />







                <div class="form-group col-8 m-3 mb-5">
                    <button type="submit" class="btn btn-outline-info  m-3">{{__('Save')}}</button>
                    <a type="button" href="{{route('product.index')}}" class="btn btn-outline-secondary">{{__('Back')}}</a>
                </div>


            </form>


    </x-master>