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
            
                    <form class="ml-5 mt-5 mr-5">
                
                        <div class="form-group row">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" disabled value="{{ $product->name }}">
        
                        </div>
                        <div class="form-group row">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" id="company" disabled value="{{ $product->company }}"> 
                        </div>
                        <div class="form-group row">
                            <label for="price">Price</label>
                            <input type="number"  class="form-control" id="price" disabled value="{{ $product->price }}">
                           
                        </div>
                        <div class="form-group row">
                            <label for="amount">Amount</label>
                            <input type="number"  class="form-control" id="amount"   disabled value="{{ $product->amount }}">
                        </div>
        
                
                        <div class="form-group row" style="float: right">
                          <div class="col-sm-10">
                            <a href="{{ route('products.index') }}" class="btn btn-dark" >Back</a>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
