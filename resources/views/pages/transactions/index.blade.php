@extends('layouts.default')

@section('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="box-title">Transactions List</h4>
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
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Transactions Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($transactions as $transaction)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $transaction->name }}</td>
                  <td>{{ $transaction->email }}</td>
                  <td>{{ $transaction->phone_number }}</td>
                  <td>Rp{{ number_format($transaction->transaction_total) }}</td>
                  <td>
                    @if ($transaction->transaction_status === 'PENDING')
                    <span class="badge badge-warning">
                      @elseif ($transaction->transaction_status === 'SUCCESS')
                      <span class="badge badge-success">
                        @elseif ($transaction->transaction_status === 'FAILED')
                        <span class="badge badge-success">
                          @else
                          <span>
                            @endif
                            {{ $transaction->transaction_status }}
                          </span>
                  </td>
                  <td>
                    @if ($transaction->transaction_status === 'PENDING')
                    {{-- <a href="{{ route('transactions.status', $transaction->id) }}?status=SUCCESS"
                      class="btn btn-success btn-sm">
                      <i class="fa fa-check"></i>
                    </a>
                    <a href="{{ route('transactions.status', $transaction->id) }}?status=FAILED"
                      class="btn btn-danger btn-sm">
                      <i class="fa fa-times"></i>
                    </a> --}}
                    @endif
                    <a href="#mymodal" data-remote="{{ route('transactions.show', $transaction->id) }}"
                      data-toggle="modal" data-target="#mymodal"
                      data-title="Transaction Detail {{ $transaction->uuid }}" class="btn btn-info btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-success btn-sm">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
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
                    No transactions yet
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