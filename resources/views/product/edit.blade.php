<x-app-layout>

<div class="w-full bg-sky-100 p-5 mx-auto">

<x-slot name="header">
    <h1 class="text-xl font-bold">Edit product</h1>
</x-slot>

@if(session('message'))
    <p class="bg-green-300 text-green-950 px-5 py-2 m-3 rounded">{{session('message')}}</p>
@endif

<a class="inline-block px-3 py-1 bg-sky-500 text-sky-50 my-3 rounded" href="{{route('product.index')}}">Show all products</a>

<form action="{{route('product.update',$product->id)}}" method="post" enctype='multipart/form-data'>
    @csrf
    @method('PUT')
    <input value="{{$product->name}}" class="block w-full border border-slate-400 rounded bg-sky-50 focus:bg-white px-3 py-1 mb-2" type="text" name="name" placeholder='Product Name' id="">
    <textarea class="block w-full border border-slate-400 rounded bg-sky-50 focus:bg-white px-3 py-1 mb-2" name="description" placeholder="Product Description" rows=7 id="">{{$product->description}}</textarea>
    <input value="{{$product->price}}" class="block w-full border border-slate-400 rounded bg-sky-50 focus:bg-white px-3 py-1 mb-2" type="number" name="price" placeholder='Enter price' id="">
    <input value="{{$product->stock}}" class="block w-full border border-slate-400 rounded bg-sky-50 focus:bg-white px-3 py-1 mb-2" type="number" name="stock" placeholder="Enter stock" id="">

    <img src="{{url('storage/'.$product->photo)}}" class="h-16" alt="">
    <input class="block w-full border border-slate-400 rounded bg-sky-50 focus:bg-white px-3 py-1 mb-2" type="file" name="photo" id="">

    <input class="px-5 py-1 bg-blue-600 text-blue-300 hover:text-blue-50 rounded-full my-2" type="submit" value="Update Record">
</form>

</div>

</x-app-layout>