    <x-master>
        <x-slot:title>
            {{__('Add Category')}}
        </x-slot:title>
        <x-forms.errors />

        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>{{__('Add Category')}}</h1>
            <form class="form-light">


                <x-forms.input name="categoryName" class="mt-2" title="Category Name" type="text" id="productName" :value="old('categoryName')" />
                <!-- <x-forms.input name="products" class="mt-2" title="products" type="text" id="products" :value="old('products')" /> -->


                @php
                $radioUnit=['yes','no'];
                @endphp
                <x-forms.radiobox name="visible" :radioUnit="$radioUnit" />


                <x-forms.input name=" description" class="mt-2" title="Description" type="text" id="description" :value="old('description')" />
                <x-forms.input name=" image" class="mt-2" title="Product Image" type="file" id="image" />






                <div class="form-group col-8 m-3 mb-5">
                    <button type="submit" class="btn btn-outline-info  m-3">{{__('Save')}}</button>
                    <a type="button" href="{{route('category.index')}}" class="btn btn-outline-secondary">{{__('Back')}}</a>
                </div>


            </form>

    </x-master>