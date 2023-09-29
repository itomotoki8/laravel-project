@extends('layouts.admin')
@section('content')
@include('commons.errors')
    <form class="mt-9" action="{{route('myadmin.store')}}" method="POST">
        @csrf
        <div class="flex justify-around">
            <label>商品名
            <input type="text" name="name" value="{{old('name')}}" class="w-full">
            </label>

            <label>値段
            <input type="number" name="price" min="0" value="{{old('price')}}" class="w-full">
        </label>
        </div>

        <label class="mt-5 block">説明
        <textarea name="explan" value="{{old('explan')}}" class="w-full h-56 resize-none"></textarea>
        </label>
        
        <input type="submit" value="登録" class="mt-4 mr-0 ml-auto block border border-slate-800 text-gray-100 bg-slate-600 cursor-pointer hover:bg-slate-900">
    </form>
@endsection
