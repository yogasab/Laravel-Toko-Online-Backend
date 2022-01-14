@extends('layouts.default')

@section('content')
<div class="card">
  <div class="card-header">
    <strong>Add Product Photo</strong>
  </div>
  <div class="card-body card-block">
    <form action="{{ route('product-galleries.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="products_id" class="form-control-label font-weight-bold">Products</label>
        <select name="products_id" class="form-control @error('product_id') is-invalid @enderror">
          <option>Choose Product</option>
          @foreach ($products as $product)
          <option value="{{ $product->id }}">{{ $product->name }}</option>
          @endforeach
        </select>
        @error('products_id')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="photo" class="form-control-label font-weight-bold">Product Photo</label>
        <input type="file" name="photo" accept="image/*" class="form-control-file @error('photo') is-invalid @enderror"
          value="{{ old('photo') }}">
        @error('photo')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="is_default" class="form-control-label font-weight-bold">Make default</label>
        <br>
        <label for="">
          <input type="radio" name="is_default" class="form-control @error('is_default') is-invalid @enderror"
            value="1" /> Yes
        </label>
        &nbsp;
        <label for="">
          <input type="radio" name="is_default" class="form-control @error('is_default') is-invalid @enderror"
            value="0" /> No
        </label>
        @error('is_default')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <button class="btn btn-success btn-block" type="submit">
          Add Photo
        </button>
      </div>

    </form>
  </div>
</div>
@endsection