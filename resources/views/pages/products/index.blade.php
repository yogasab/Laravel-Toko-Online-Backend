@extends('layouts.default')

@section('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="box-title">Daftar Barang</h4>
        </div>
        <div class="card-header">
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @forelse ($products as $product)
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->type }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>
                    <a href="#" class="btn btn-info btn-sm">
                      <i class="fa fa-picture-o"></i>
                    </a>
                    <a href="#" class="btn btn-primary btn-sm">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <form action="#" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                  @empty
                <tr>
                  <td colspan="6" class="text-center p-5">
                    Tidak ada produk
                  </td>
                </tr>
                @endforelse
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection