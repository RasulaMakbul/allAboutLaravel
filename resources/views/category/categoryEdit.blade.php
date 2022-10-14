    <x-master>
        <x-slot:title>
            {{__('Edit Category')}}
        </x-slot:title>
        <x-forms.errors />

        <form action="{{route('category.update',$category->id)}}" method="POST">
            @csrf
            @method('patch')
            <h1>{{__('Edit Category')}}</h1>
            <form class="form-light">


                <x-forms.input name="categoryName" class="mt-2" title="category Name" type="text" id="categoryName" :value="old('categoryName',$category->categoryName)" />
                <!-- <x-forms.input name="products" class="mt-2" title="products" type="text" id="products" :value="old('products',$category->products)" /> -->


                @php
                $radioUnit=['yes','no'];
                $setItemr = array();
                foreach($radioUnit as $key => $item) {
                if ($item == $category->visible) {
                $setItemr[] = $item;
                }
                }
                @endphp
                <x-forms.radiobox name="visible" :radioUnit="$radioUnit" :setItemr="$setItemr" />
                <x-forms.input type="file" name="image" class="mt-2" title="category Image" id="image" :value="$category->image" />

                <x-forms.input name=" description" class="mt-2" title="Description" type="text" id="description" :value="old('description',$category->description)" />


                <div class="form-group col-8 m-3 mb-5">
                    <button type="submit" class="btn btn-outline-info  m-3">{{__('Save')}}</button>
                    <a type="button" href="{{route('category.index')}}" class="btn btn-outline-secondary">{{__('Back')}}</a>
                </div>


            </form>


    </x-master>