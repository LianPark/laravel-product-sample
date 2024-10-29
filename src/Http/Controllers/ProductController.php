<?php

namespace Lianpark\Product\Http\Controllers;

use Lianpark\Product\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lianpark\Product\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product){
        // Laravel 의 IOC(Inversion of Control) 입니다
        // 일단은 이렇게 모델을 가져오는 것이 추천 코드라고 생각하시면 됩니다.
        $this->product = $product;
    }

    public function index()
    {
        // products 의 데이터를 최신순으로 페이징을 해서 가져옵니다.
        $products = $this->product->latest()->paginate(5);
        // produce/index.blade 에 $products 를 보내줍니다
        return view('product::products.index', compact('products')); //
    }

    public function create(){
        return view('product::products.create');
    }

    public function store(StoreProductRequest $request)
    {
        // Request 에 대한 유효성 검사입니다, 다양한 종류가 있기에 공식문서를 보시는 걸 추천드립니다.
        // 유효성에 걸린 에러는 errors 에 담깁니다.
        $validated = $request->validated();
        $this->product->create($validated);
        return redirect()->route('products.index');
    }

    // 상세 페이지
    public function show(Product $product)
    {
        //print_r($product);
        // show 에 경우는 해당 페이지의 모델 값이 파라미터로 넘어옵니다.
        return view('product::products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        //print_r($product);
        return view('product::products.edit', compact('product'));
    }

    public function update(Request $request, Product $product){
        $request = $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);
        // $product는 수정할 모델 값이므로 바로 업데이트 해줍시다.
        $product->update($request);
        return redirect()->route('products.index', $product);
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index');
    }
}