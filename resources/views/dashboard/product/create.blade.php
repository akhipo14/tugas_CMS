@extends('layouts.master')
@section('content')
    <h2 class="mb-3">Add Product</h2>
    <div class="card p-3">
    <form class="row g-3" method="post" enctype="multipart/form-data" action="{{url('product-dashboard')}}">
        @csrf
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Nama Product</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputEmail4" name="nama" 
          style="background-color: rgb(240, 240, 244)" autofocus placeholder="Indomie Goreng"
          value="{{old('nama')}}">
            @error('nama')
                  <div class="text-danger">
                      {{$message}}
                  </div>
            @enderror
        </div>

        <div class="col-md-6">
          <label for="inputState"  class="form-label">Kategori Product</label>
          <select id="inputState" class="form-select @error ('category_id') is-invalid @enderror" name="category_id" style="background-color: rgb(240, 240, 244)">
            @foreach ($categories as $item)
            @if (old('category_id') == $item->id)
            <option value="{{$item->id}}"selected>{{$item->nama}}</option>
            @else
            <option value="{{$item->id}}">{{$item->nama}}</option>
            @endif
            @endforeach
          </select>
            @error('category_id')
                  <div class="text-danger">
                      {{$message}}
                  </div>
            @enderror
        </div>

        <div class="col-md-6">
          <label  class="form-label">Harga Product</label>
          <input type="text" class="form-control @error('harga') is-invalid @enderror" id="inputPassword4" name="harga" 
          style="background-color: rgb(240, 240, 244)" placeholder="1000" value="{{old('harga')}}">
            @error('harga')
                  <div class="text-danger">
                      {{$message}}
                  </div>
            @enderror
        </div>

        <div class="col-md-6">
          <label for="inputCity" class="form-label">Gambar Product</label>
          <input type="file" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" name="gambar"
           id="formFile" style="background-color: rgb(240, 240, 244)">
            @error('gambar')
                  <div class="text-danger">
                      {{$message}}
                  </div>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Product</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="exampleFormControlTextarea1" name="deskripsi"
            rows="3" style="background-color: rgb(240, 240, 244)" placeholder="Deskripsikan product anda">{{old('deskripsi')}}</textarea >
            @error('deskripsi')
                  <div class="text-danger">
                      {{$message}}
                  </div>
            @enderror
        </div>

        <div class="d-flex align-items-end justify-content-end">
          <button type="submit" class="btn btn-primary">Add Product</button>
        <a href="" class="btn btn-secondary ms-3">Back</a>
        </div>
      </form>
    </div>
@endsection
