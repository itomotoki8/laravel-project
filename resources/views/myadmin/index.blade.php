@extends('layouts.admin')
@section('content')
<p class="text-center text-5xl mt-11">ホーム</p>

@foreach($products as $product)
<div class="flex justify-around mt-10">
    <p>{{$product->name}}</p>
    <p>{{$product->price}}円</p>
    <p>{{$product->created_at}}</p>
</div>
<p class="mb-10 mt-5 text-center">{!! nl2br(e($product->text)) !!}</p>
<hr>
@endforeach
@endsection