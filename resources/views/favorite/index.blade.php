@extends('layouts.default')
@section('content')
<h2 class="text-center text-4xl">お気に入り</h2>
<table class="border-separate border-spacing-y-10 border-spacing-x-56 mx-auto" id="table">
    <tr class="text-2xl">
        <th>商品名</th>
        <th>値段</th>
    </tr>

</table>
@endsection

@section('script')
<script>
        const datas = JSON.parse(localStorage.getItem("product"));
        //trタグをhtmlに送る
        datas.map((e,key)=> {
            const name = e.name;
            const price = e.price;
            const id = e.id;
            document.getElementById('table').insertAdjacentHTML('beforeend',`<tr class="text-lg" id="${id}"><td>${name}</td><td>${price}</td><td><button type="button" value="${id}" onClick="deleteData(this.value)">削除</button></td></tr>`);
        });

        //localStorageから削除
    function deleteData(id) {
        const json = localStorage.getItem("product");
        const datas = JSON.parse(json);
        JSON.parse(localStorage.getItem("product")).map((e,key)=>{
            if(e.id == id) {
                datas.splice(key,1);
            }
        });
        //htmlコードから削除
        localStorage.setItem("product",JSON.stringify(datas));
        document.getElementById(id).remove();
        if(datas.length == 0) {
        document.getElementById('table').innerHTML = '<p class="text-lg mt-16">お気に入りはありません</p>'
    }
    }

    //お気に入りがない時の表示
    if(datas.length == 0) {
        document.getElementById('table').innerHTML = '<p class="text-lg mt-16">お気に入りはありません</p>'
    }

</script>
@endsection