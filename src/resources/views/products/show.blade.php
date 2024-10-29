@extends('product::products.layout')

@section('content')
    <h2 class="mt-4 mb-3">Product View: {{$product->name}}</h2>
    <p style="text-align: right" class="pt-2">{{$product->created_at}}</p>

    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$product->content}}
        </div>
    </div>
    <br />
    <div>
      <a href="{{route('products.index')}}"><button type="button" class="btn btn-primary">홈으로</button></a>
      <a href="{{route('products.edit', $product)}}"><button type="button" class="btn btn-primary">수정</button></a>
      <form action="{{route('products.destroy', $product->id)}}" method="post" style="display:inline-block;">
          {{-- delete method와 csrf 처리필요 --}}
          @method('delete')
          @csrf
          <button onclick="return confirm('정말로 삭제하겠습니까?')" type="submit" value="delete" class="btn btn-primary">삭제</button>
      </form>
    </div>
@endsection