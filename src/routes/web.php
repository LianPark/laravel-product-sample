<?php

use Illuminate\Support\Facades\Route;
use Lianpark\Product\Http\Controllers\ProductController;

Route::get('/test', function () {
  return 'This is test page';
})->name('test');





Route::middleware(['web'])->group(function () {

  // products 로 get 요청이 올 경우 ProductController 의 index 함수를 실행합니다.
  // name 은 별명으로 나중에 route('product.index') 로 쉽게 주소 출력이 가능합니다.
  Route::get('/products', [ProductController::class, 'index'])->name('products.index');
  Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
  // store 요청은 form 을 통해 post 로 옵니다.
  Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

  // {product}는 주소의 변경가능한 값이 오는 것을 product로 받는 것을 의미합니다, 이 값은 현재 아이디가 오는 데
  // 해당 아이디에 맞춘 모델 객체를 ProductController의 show 함수에 매개변수로 보내는 동작을 수행합니다.
  Route::get('products/{product}',[ProductController::class, 'show'])->name("products.show");


  // 수정 페이지
  Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name("products.edit");
  // Laravel에서 업데이트의 대한 메서드로는 Patch 또는 Put을 권장합니다.
  Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');

  // 삭제
  Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

});