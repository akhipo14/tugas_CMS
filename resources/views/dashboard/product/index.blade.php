@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
    <script>
        alert('Insert Data Product Success!')
    </script>
    @endif
    @if (Session::has('update'))
        <script>
            alert('Update Data Product Success!')
        </script>
    @endif
    @if (Session::has('delete'))
    <script>
        alert('Delete Data Product Success!')
    </script>
    @endif
    <h3 style="font-weight: bold;letter-spacing: .5px;" class="mb-3">Halaman Product</h3>
    <a href="{{url('product-dashboard')}}/create" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-plus me-1"></i> Add Product</a>
    <div class="card "  style="background-color: rgb(240, 240, 244) ;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">    
        <table class="table table-bordered border-white text-center">
            <thead class="table-dark">
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>deskripsi</th>
                <th>Harga</th>
                <th>Update</th>
                <th>Delete</th>
            </thead>
            
            @foreach ($product as $item)
            <tbody>
                <td>{{$loop->iteration}}</td>
                <td>
                    @if ($item->gambar)
                    <img src="{{asset('storage/'.$item->gambar)}}" alt="" class="img-thumbnail rounded" style="max-width: 70px;height:70px;margin:0;object-fit: cover;">
                    
                    @else
                    <p>tidak ada gambar</p>
                                    
                    @endif
                </td>
                <td>{{$item->nama}}</td>
                <td>{{$item->category->nama}}</td>
                <td>{{$item->deskripsi}}</td>
                <td>{{$item->harga}}</td>
                <td>
                    <a href="/product-dashboard/{{$item->id}}/edit" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
                </td>
                <td>
                    <form action="/product-dashboard/{{$item->id}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete Product?')" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tbody>
            @endforeach
        </table>
        <div class="d-flex justify-content-end me-3">
            {!! $product->links('pagination::simple-bootstrap-5') !!}
        </div>
    </div>
@endsection