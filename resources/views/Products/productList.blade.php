    <x-master>
        <x-slot:title>
            {{__('Products')}}
        </x-slot:title>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__('Products')}}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a type="button" href="{{route('product.pdf')}}" class="btn btn-sm btn-outline-secondary"><i class="fa-regular fa-file-pdf"></i> {{__('pdf')}}</a>
                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-table"></i> {{__('Excel')}}</button>
                    <a type="button" href="{{route('product.trash')}}" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-trash fs-5"></i> {{__('Trash')}}</a>

                </div>
                <a type="button" href="{{route('product.create')}}" class="btn btn-sm btn-outline-secondary">
                    <i class="fa-solid fa-plus"></i>
                    {{__('Create Product')}}
                </a>
            </div>
        </div>

        <div class="container-fluid pt-4 px-4">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Image')}}</th>
                        <th scope="col">{{__('Product Name')}}</th>
                        <th scope="col">{{__('Category')}}</th>
                        <th scope="col">{{__('Color')}}</th>
                        <th scope="col">{{__('Brand')}}</th>
                        <th scope="col">{{__('Unit Price')}}</th>
                        <th scope="col">{{__('Stock')}}</th>
                        <th scope="col">{{__('Unit')}}</th>
                        <th scope="col">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td><img src="{{asset('storage/categories/'.$product->image)}}" alt=""></td>
                        <td>{{ $product->productName }}</td>
                        <td>{{ $product->category->categoryName }}</td>
                        <td>{{ $product->color }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->unitPrice }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->unit }}</td>


                        <td>
                            <a href="#" class="link-success"><i class="fa-solid fa-eye fs-5 me-3"></i></a>
                            <a href="{{route('product.edit',$product->id)}}" class="link-info"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
                            </form>


                            <!-- <a href="{{route('product.destroy', $product->id)}}" onclick="return confirm('are you sure want to delete?')" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a> -->
                        </td>
                    </tr>

                    <!-- <img src="{{asset('storage/categories/'.$product->image)}}" alt=""> -->
                    @endforeach



                </tbody>
            </table>

        </div>

    </x-master>