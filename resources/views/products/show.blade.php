@extends('layouts.default')

@section('content')
<div>
    <h2 class="text-4xl text-center tracking-widest">{{$product->name}}</h2>
    <div class="mt-16 leading-loose text-center">{!! nl2br(e($product->text)) !!}</div>
    
    <!-- <input type="hidden" name="product_id" value="{{$product->id}}">
    @if(Auth::check())
    @if($cookie)
    @if(in_array($product->id,$cookie))
    <button id="iza" class="text-red-600 block ml-auto mr-72 mt-10 text-4xl">♥</button>
    @else
    <button id="iza" class="text-slate-400 block ml-auto mr-72 mt-10 text-4xl">♥</button>
    @endif
    @else
    <button id="iza" class="text-slate-400 block ml-auto mr-72 mt-10 text-4xl">♥</button>
    @endif
    @endif -->
    <button id="iza" class="text-slate-400 block ml-auto mr-72 mt-10 text-4xl" value="{{$product->id}}" onClick="inputData()">♥</button>
    <input type="hidden" value="{{$product->name}}" id="name">
    <input type="hidden" value="{{$product->price}}" id="price">
</div>

@endsection
@section('script')
<script>
    const id = document.getElementById('iza').value;
    const target = document.getElementById('iza');

    //初期のいいねの色
    if(localStorage.getItem("product")) {
        JSON.parse(localStorage.getItem("product")).map(e => {
            if(e.id == id) {
                target.classList.remove("text-slate-400");
                target.classList.add("text-red-600");
            }
        })    
    }

    function inputData() {
        const name = document.getElementById('name').value;
        const price = document.getElementById('price').value;        

        const data = {
            id:id,
            name:name,
            price:price
        };

        if(target.classList.contains("text-slate-400")) {
            save();
        }else {
            remove();
        }

        function save() {
            if(localStorage.getItem("product")) {
                const json = localStorage.getItem("product");
                const datas = JSON.parse(json);
                datas.push(data);
                localStorage.setItem("product",JSON.stringify(datas));

            }else {
                const datas = [];
                datas.push(data);
                localStorage.setItem("product",JSON.stringify(datas));
            }
            target.classList.remove("text-slate-400");
            target.classList.add("text-red-600");
        }

        function remove() {
            if(localStorage.getItem("product")) {
                const json = localStorage.getItem("product");
                const datas = JSON.parse(json);
                JSON.parse(localStorage.getItem("product")).map((e,key)=>{
                    if(e.id == id) {
                        datas.splice(key,1);
                    }
                });
                localStorage.setItem("product",JSON.stringify(datas));
            }
            target.classList.add("text-slate-400");
            target.classList.remove("text-red-600");
        }
        const obj = JSON.parse(localStorage.getItem("product"));
        console.log(obj);
    }




    // $.ajaxSetup({
        //     headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
        // })
        // $('#iza').on('click', function(){
        //     id = $('input[name="product_id"]').val();
        //     if($(this).hasClass('text-red-600')) {
        //         $.ajax({
        //         url: "/favorite/" + id,
        //         method: "POST",
        //         data: { "id" : id,"_method":"DELETE"},
        //     });
        //     $(this).removeClass("text-red-600");
        //     $(this).addClass('text-slate-400');
        //     }else {
        //     $.ajax({
        //         url: "{{ route('favorite.store') }}",
        //         method: "POST",
        //         data: { product_id : id },
        //         dataType: "json",
        //     });
        //     $(this).addClass('text-red-600');
        //     $(this).removeClass("text-slate-400");
        //     }
        // });

</script>
@endsection