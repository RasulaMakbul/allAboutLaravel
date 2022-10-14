    <x-master>
        <x-slot:title>
            {{__('Category')}}
        </x-slot:title>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__('Category')}}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a type="button" href="{{route('category.pdf')}}" class="btn btn-sm btn-outline-secondary"><i class="fa-regular fa-file-pdf"></i> {{__('pdf')}}</a>

                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-table"></i> {{__('Excel')}}</button>
                </div>
                <a type="button" href="{{route('category.create')}}" class="btn btn-sm btn-outline-secondary">
                    <i class="fa-solid fa-plus"></i>
                    {{__('Create category')}}
                </a>
            </div>
        </div>

        <div class="container-fluid pt-4 px-4">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Image')}}</th>
                        <th scope="col">{{__('category Name')}}</th>
                        <th scope="col">{{__('Visible')}}</th>
                        <th scope="col">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td><img src="{{asset('storage/categories/'.$category->image)}}" alt=""></td>
                        <td>{{ $category->categoryName }}</td>
                        <td>{{ $category->visible }}</td>


                        <td>
                            <a href="#" class="link-success"><i class="fa-solid fa-eye fs-5 me-3"></i></a>
                            <a href="{{route('category.edit',$category->id)}}" class="link-info"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <a href="{{route('category.destroy',$category->id)}}" onclick="return confirm('are you sure want to delete?')" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                    </tr>

                    @endforeach



                </tbody>
            </table>

        </div>

    </x-master>