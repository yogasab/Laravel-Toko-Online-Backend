@extends('layouts.default')

@section('content')
<div class="card">
  <div class="card-header">
    <strong>Edit Transaction</strong>
    <small>{{ $transaction->uuid }}</small>
  </div>
  <div class="card-body card-block">
    <form action="{{ route('transactions.update', $transaction->id) }}" method="post">

      @method('PUT')
      @csrf

      <div class="form-group">
        <label for="name" class="form-control-label font-weight-bold">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
          value="{{ old('name') ? old('name') : $transaction->name }}">
        @error('name')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email" class="form-control-label font-weight-bold">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
          value="{{ old('email') ? old('email') : $transaction->email }}">
        @error('email')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="phone_number" class="form-control-label font-weight-bold">Phone Number</label>
        <input type="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
          value="{{ old('phone_number') ? old('phone_number') : $transaction->phone_number }}">
        @error('phone_number')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="address" class="form-control-label font-weight-bold">Address</label>
        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
          value="{{ old('address') ? old('address') : $transaction->address }}">
        @error('address')
        <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <button class="btn btn-success btn-block" type="submit">
          Update Transaction
        </button>
      </div>
    </form>
  </div>
</div>
@endsection