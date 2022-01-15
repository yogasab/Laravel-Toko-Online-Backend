<table class="table table-bordered">
  <tr>
    <th>Name</th>
    <th>{{ $transaction->name }}</th>
  </tr>
  <tr>
    <th>Email</th>
    <th>{{ $transaction->email }}</th>
  </tr>
  <tr>
    <th>Phone Number</th>
    <th>{{ $transaction->phone_number }}</th>
  </tr>
  <tr>
    <th>Address</th>
    <th>{{ $transaction->address }}</th>
  </tr>
  <tr>
    <th>Transaction Total</th>
    <th>{{ $transaction->transaction_total }}</th>
  </tr>
  <tr>
    <th>Transaction Status</th>
    <th>{{ $transaction->transaction_status }}</th>
  </tr>
  <tr>
    <th>Product Purchase</th>
    <td>
      <table class="table table-bordered">
        <tr>
          <th>Name</th>
          <th>Type</th>
          <th>Price</th>
        </tr>
        @foreach ($transaction->transaction_details as $detail)
        <tr>
          <td>{{ $detail->product->name }}</td>
          <td>{{ $detail->product->type }}</td>
          <td>{{ $detail->product->price }}</td>
        </tr>
        @endforeach
      </table>
    </td>
  </tr>
</table>
<div class="row">
  <div class="col-4">
    <a href="{{ route('transactions.status', $transaction->id) }}?status=SUCCESS" class="btn btn-success btn-block">
      <i class="fa fa-check"></i> Set to success
    </a>
  </div>
  <div class="col-4">
    <a href="{{ route('transactions.status', $transaction->id) }}?status=PENDING" class="btn btn-warning btn-block">
      <i class="fa fa-check"></i> Set to pending
    </a>
  </div>
  <div class="col-4">
    <a href="{{ route('transactions.status', $transaction->id) }}?status=FAILED" class="btn btn-danger btn-block">
      <i class="fa fa-check"></i> Set to failed
    </a>
  </div>
</div>