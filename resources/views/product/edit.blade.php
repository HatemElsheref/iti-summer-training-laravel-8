<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="col-span-6 sm:col-span-4">
            
                    <form class="ml-5 mt-5 mr-5" method="post" action="{{ route('products.update',$product->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="name" value="{{ $product->name }}">
                            @error('name')
                            <div id="name" class="invalid-feedback">{{$message}}</div> 
                            @enderror   
                        </div>
                        <div class="form-group row">
                            <label for="company">Company</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" aria-describedby="company" value="{{ $product->company }}">
                            @error('company')
                            <div id="company" class="invalid-feedback">{{$message}}</div> 
                            @enderror   
                        </div>
                        <div class="form-group row">
                            <label for="price">Price</label>
                            <input type="number" step="0.1" min="0"  class="form-control @error('price') is-invalid @enderror" id="price" name="price" aria-describedby="price" value="{{ $product->price }}">
                            @error('price')
                            <div id="price" class="invalid-feedback">{{$message}}</div> 
                            @enderror   
                        </div>
                        <div class="form-group row">
                            <label for="amount">Amount</label>
                            <input type="number" step="1" min="1"  class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" aria-describedby="amount" value="{{ $product->amount }}">
                            @error('amount')
                            <div id="amount" class="invalid-feedback">{{$message}}</div> 
                            @enderror   
                        </div>
        
                
                        <div class="form-group row" style="float: right">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-success" >Edit</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
