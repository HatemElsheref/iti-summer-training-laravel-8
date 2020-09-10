<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    const SUCCESS=200;
    const FAIL=100;

    public function index()
    {
        $products=Product::all();
        return view('product.index',compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }


    public function store(Request $request)
    {
        $this->validateInputs($request);
        $validatedData=$request->except(['_token']);
        $product=Product::create($validatedData);

        if($product){
            $this->alert(self::SUCCESS);
        }else{
            $this->alert();
        }
        return redirect()->route('products.index');
    }


    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }


    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $this->validateInputs($request,$product->id);
        $validatedData=$request->except(['_method','_token']);
        if($product->update($validatedData)){
            $this->alert(self::SUCCESS);
        }else{
            $this->alert();
        }
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        if($product->delete()){
            $this->alert(self::SUCCESS);
        }else{
            $this->alert();
        }
        return redirect()->route('products.index');
       
    }

    private function validateInputs(Request $request,$id=null){
        if($id){
            $request->validate([
                'name'=>'required|string|max:191',Rule::unique('producrs')->ignore($id),
                'price'=>'required|numeric|min:0',
                'company'=>'required|string|max:191',
                'amount'=>'required|numeric|min:1'
            ]);
    
        }else{
            $request->validate([
                'name'=>'required|string|max:191|unique:products,name',
                'price'=>'required|numeric|min:0',
                'company'=>'required|string|max:191',
                'amount'=>'required|numeric|min:1'
            ]);
        }
       

    }

    private function alert($case=self::FAIL){
        if($case===self::SUCCESS){
            session()->flash('type','success');
            session()->flash('message','Success Operation');
        }else{
            session()->flash('type','dasnger');
            session()->flash('message','Failed Operation');
        }
     
    }
}
