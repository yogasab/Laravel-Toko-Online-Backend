@extends('layouts.default')

@section('content')
<div class="card">
  <div class="card-header">
    <strong>Update Produk</strong>
    <small>{{ $product->name }}</small>
  </div>
  <div class="card-body card-block">
    <form action="{{ route('products.update', $product->slug) }}" method="post">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="name" class="form-control-label font-weight-bold">Nama Produk</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
          value="{{ old('name') ? old('name') : $product->name }}">
        @error('name')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="type" class="form-control-label font-weight-bold">Tipe Produk</label>
        <input type="text" name="type" class="form-control @error('type') is-invalid @enderror"
          value="{{ old('type') ? old('type') : $product->type }}">
        @error('type')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="type" class="form-control-label font-weight-bold">Deskripsi</label>
        <textarea name="description"
          class="ckeditor form-control @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $product->description }}</textarea>
        @error('description')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="price" class="form-control-label font-weight-bold">Harga Produk</label>
        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
          value="{{ old('price') ? old('price') : $product->price }}">
        @error('price')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="quantity" class="form-control-label font-weight-bold">Stok Produk</label>
        <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
          value="{{ old('quantity') ? old('quantity') : $product->price }}">
        @error('quantity')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <button class="btn btn-success btn-block" type="submit">
          Update Barang
        </button>
      </div>
    </form>
  </div>
</div>
@endsection