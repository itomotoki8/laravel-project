@extends('layouts.default')
@section('content')
<h2 class="text-center text-4xl">商品一覧</h2>
<div class="flex justify-center mt-16">
<form action="{{route('products.index')}}" method="get">
    <input type="text" name="find" class="w-96" placeholder="名前入力で検索">
    <button type="submit">検索</button>
</form>
</div>

<div class="absolute top-1/4 right-24 tracking-widest flex flex-col gap-5 text-lg">
    <button type="submit" value="price_asc" >@sortablelink('price','値段')</button>
    <button type="submit" value="price_desc">@sortablelink('created_at','更新日')</button>
</div>

@if(count($products) == 0)
<p class="text-center text-3xl mt-24">検索した商品が見つかりませんでした</p>
<a href="{{route('products.index')}}" class="block relative left-3/4 top-10">戻る</a>
@else
<table class="border-separate border-spacing-y-10 border-spacing-x-56 mx-auto">
    <tr class="text-2xl">
        <th>商品名</th>
        <th>値段</th>
        <th></th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td><a href="{{route('products.show',$product)}}" class="text-cyan-600">詳細</a></td>
    </tr>
    @endforeach
</table>
@endif

<span class="mt-10">{{ $products->appends(request()->query())->links('vendor.pagination.tailwind2') }}</span>
@endsection