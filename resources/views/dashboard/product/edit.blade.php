@extends('layouts.master')
@section('content')
    <h2 class="mb-3">Add Product</h2>
    <div class="card p-3">
    <form class="row g-3" method="post" enctype="multipart/form-data" action="/product-dashboard/{{$products->id}}">
        @method('put')
        @csrf

        <div class="col-md-4 text-center me-5">
            <label  class="form-label ">Gambar Product</label>
            <div class="d-flex">
                <img src="{{asset('storage/'.$products->gambar)}}" alt="" class="img-thumbnail rounded" style="width:100%;height:350px;margin:0;object-fit: cover">
            </div>
            <div class="label mt-3">          
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" name="gambar"
                id="formFile" style="background-color: rgb(240, 240, 244)" value="{{asset('storage/'.$products->gambar)}}">
            </div>
        </div>
  
        <div class="col-md-7 mt-5">
            <div class="label">
                <label for="inputEmail4" class="form-label">Nama Product</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputEmail4" name="nama" 
                style="background-color: rgb(240, 240, 244)" autofocus placeholder="Indomie Goreng"
                value="{{$products->nama}}">
                    @error('nama')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
            </div>
    
            <div class="label mt-3">
                <label for="inputState"  class="form-label">Kategori Product</label>
                <select id="inputState" class="form-select" name="category_id" style="background-color: rgb(240, 240, 244)">
                    @foreach ($categories as $item)
                    @if ( $item->id == $products->category_id)
                    <option value="{{$item->id}}"selected>{{$item->nama}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="label mt-3">
                <label  class="form-label">Harga Product</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="inputPassword4" name="harga" 
                style="background-color: rgb(240, 240, 244)" placeholder="1000" value="{{$products->harga}}">
                @error('harga')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            
            <div class="label mt-3">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Product</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="exampleFormControlTextarea1" name="deskripsi"
                rows="3" style="background-color: rgb(240, 240, 244)" placeholder="Deskripsikan product anda">{{$products->deskripsi}}</textarea >
                @error('deskripsi')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="d-flex align-items-end justify-content-end mt-3">
              <button type="submit" class="btn btn-primary">Add Product</button>
            <a href="/product-dashboard" class="btn btn-secondary ms-3">Back</a>
            </div>
        </div>

      </form>
    </div>
@endsection
