<x-app-layout>

<div class="w-full bg-sky-100 p-5 mx-auto">

<x-slot name="header">
    <h1 class="text-xl font-bold">Create new product</h1>
</x-slot>

<a class="inline-block px-3 py-1 bg-sky-500 text-sky-50 my-3 rounded" href="{{route('product.index')}}">Show all products</a>

<form action="{{route('product.store')}}" method="post" enctype='multipart/form-data'>
    @csrf
    @method('POST')
    <input class="block w-full border border-slate-400 rounded bg-sky-50 focus:bg-white px-3 py-1 mb-2" type="text" name="name" placeholder='Product Name' id="">
    <textarea class="block w-full border border-slate-400 rounded bg-sky-50 focus:bg-white px-3 py-1 mb-2" name="description" placeholder="Product Description" rows=7 id=""></textarea>
    <input class="block w-full border border-slate-400 rounded bg-sky-50 focus:bg-white px-3 py-1 mb-2" type="number" name="price" placeholder='Enter price' id="">
    <input class="block w-full border border-slate-400 rounded bg-sky-50 focus:bg-white px-3 py-1 mb-2" type="number" name="stock" placeholder="Enter stock" id="">

    <input class="block w-full border border-slate-400 rounded bg-sky-50 focus:bg-white px-3 py-1 mb-2" type="file" name="photo" id="">

    <input class="px-5 py-1 bg-blue-600 text-blue-300 hover:text-blue-50 rounded-full my-2" type="submit" value="Save Record">
</form>

</div>

</x-app-layout>