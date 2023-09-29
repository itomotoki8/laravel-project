@extends('layouts.admin')
@section('content')
<p class="text-center text-5xl mt-11">一覧</p>

<table class="border-separate border-spacing-y-10 border-spacing-x-56 mx-auto">
    <tr class="text-2xl">
        <th>id</th>
        <th>商品名</th>
        <th>値段</th>
        <th></th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <!-- <td>{{$product->created_at}}</td> -->
        <td><a href="{{route('myadmin.edit',$product)}}">編集</a></td>
    </tr>
@endforeach
@endsection