<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="col-span-6 sm:col-span-4 text-center">
                    @if(session()->has('message'))
                    <div class="alert mb-3 mt-3 ml-3 mr-3 alert-{{ session()->get('type') }}">{{ session()->get('message') }}</div>
                    @endif
                    
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary mb-3 mr-3 mt-3" style="float: right"> Add New Product</a>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Price</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td scope="row">{{ $product->id }}</td>
                                <td scope="row">{{ $product->name }}</td>
                                <td scope="row">{{ $product->company }}</td>
                                <td scope="row">{{ $product->price() }}</td>
                                <td scope="row">{{ $product->amount }}</td>
                                <td scope="row">
                                    <a href="{{ route('products.show',$product->id) }}" class="btn bnt-sm btn-warning">View</a>
                                    <a href="{{ route('products.edit',$product->id) }}" class="btn bnt-sm btn-success">Edit</a>
                                    <button class="btn bnt-sn btn-danger" onclick="document.getElementById('remove-product-{{ $product->id }}').submit();return false;">Delete</button>
                                </td>
                                <form id="remove-product-{{ $product->id }}" method="post" action="{{ route('products.destroy',$product->id) }}">
                                    @method('delete')
                                    @csrf
                                </form>
                              </tr> 
                              @empty
                                <tr class="text-center"><td colspan="6">No Products In Stock</td></tr>
                             
                            @endforelse
                         
                
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
