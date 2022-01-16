@extends('layouts.default')

@section('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="box-title">Product Galleries</h4>
        </div>
        <div class="card-header">
          {{-- Flash Message --}}
          @if ($message= Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Default</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($products as $product)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $product->product->name }}</td>
                  <td>
                    <img src="{{ url($product->photo) }}" alt="">
                  </td>
                  <td>{{ $product->is_default ? 'Yes' : 'No' }}</td>
                  <td>
                    <form action="{{ route('product-galleries.destroy', $product->id) }}" method="POST"
                      class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
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