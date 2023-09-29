@extends('layouts.admin')
@section('content')
@include('commons.errors')
    <form class="mt-9" action="{{route('myadmin.update',$product->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="flex justify-around">
            <label>商品名
            <input type="text" name="name" value="{{$product->name,old('name')}}" class="w-full">
            </label>

            <label>値段
            <input type="number" name="price" min="0" value="{{$product->price,old('name')}}" class="w-full">
        </label>
        </div>

        <label class="mt-5 block">説明
        <textarea name="explan" value="{{old('explan')}}" class="w-full h-56 resize-none">{!! e($product->text) !!}</textarea>
        {!! nl2br(e($product->text)) !!}
        </label>

        <div class="flex gap-10 mt-20 text-xl justify-center">
            <button><a href="{{route('myadmin.list')}}">戻る</a></button>
            <input type="submit" value="編集" class="cursor-pointer">
        </div>
    </form>
@endsection
