@extends('layouts/auth')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/admin-lte/index2.html" class="h1"><b>Cloud</b>Wage</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Choose company to start your session</p>
  
        <form action="{{ route('choose.company.store') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <select name="company_id" class="company_id form-control">
              <option value="">Select Company</option>
              @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="input-group mb-3">
            <select name="subscription_url" class="form-control" id="subscription_url">
                <option value="">Select SubScription</option>
              </select>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Choose</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
    <!-- /.form-box -->
  </div><!-- /.card -->    
@endsection
@section('scripts')
<script>
  $(document).ready(function () {
    $('.company_id').on('change', function () {
      $.ajax({
        url: '/ajax/company/' + $(this).val() + '/subscriptions',
        type: 'GET',
        success: function(response) {
          $('#subscription_url').empty(); // Clear previous options
          $.each(response, function(index, subscription) {
            $('#subscription_url').append($('<option>', {
              value: subscription.path,
              text: subscription.name
            }));
          });
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
          // Handle errors here
        }
      });
    })
  });
</script>
@endsection
