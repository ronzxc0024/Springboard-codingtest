<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List Product</h1>
                        <a href="{{ route('create') }}" class="btn btn-primary">Add Product</a>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert"> 
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td class="align-middle">{{ $product->id }}</td>
                                <td class="align-middle">{{ $product->productname }}</td>
                                <td class="align-middle">{{ $product->category }}</td>
                                <td class="align-middle">{{ $product->price }}</td>
                                <td class="">
                                    <div class="btn-group" aria-label="Basic example">
                                        <div>
                                            <a href="{{ route('edit', ['id'=>$product->id]) }}" type="button" class="btn btn-secondary mr-1">Edit</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('delete', ['id'=>$product->id]) }}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Product not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8">

    function delete_product()
        {
            Swal.fire({
            title: 'Delete', 
            text: 'Are you sure you want to delete?',
            icon:'question',
            confirmButtonText: 'Yes',
            confirmButtonColor: '#fa0031',
            cancelButtonColor: '#fa0031',
            showCancelButton:'true',
            cancelButtonText:'No',  
            }).then((result) => {
            if (result.value) {
                let url = "{{ route('delete', ['id'=>$product->id]) }}";
                document.location.href=url;
            }
            else 
            {
                let url = "{{ route('dashboard') }}";
                document.location.href=url;
            }
            });
        }
</script> --}}