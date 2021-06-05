@extends('layouts.app_admin')

@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>

      <div class="row">

        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Payment Methode</h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              <p class="text-muted font-13 m-b-30"></p>


              @include('paymentmethodemodule::payment_methods.create')
              @include('paymentmethodemodule::payment_methods.edit')

              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
              @endif
              @if ($message = Session::get('failed'))
                <div class="alert alert-danger">
                <p>{{ $message }}</p>
                </div>
              @endif
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                     @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                     @endforeach
                  </ul>
                </div>
                @endif

              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>

                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Country</th>
                    <th>Min</th>
                    <th>Max</th>
                    @if(auth()->user()->can('payment-method-edit'))
                    <th>Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody id="paymentMethods_items">
                    @forelse ($paymentMethods as $paymentMethod)
                    <tr class="paymentMethod_{{ $paymentMethod->id }} ">
                        <td>#{{$paymentMethod->id}}</td>
                        <td class="paymentMethod_name">{{$paymentMethod->name}}</td>
                        <td class="paymentMethod_display_name">{{$paymentMethod->display_name}}</td>

                        <td class="paymentMethod_country">{{$paymentMethod->country}}</td>
                        <td class="paymentMethod_min">{{$paymentMethod->min}}</td>
                        <td class="paymentMethod_max">{{$paymentMethod->max}}</td>
                        @if(auth()->user()->can('payment-method-edit'))
                        <td>
                            @can('payment-method-edit')
                            <a class="btn btn-primary"  href="javascript:;" onclick='editpaymentMethod({{$paymentMethod->id}})'>Edit</a>
                            @endcan

                        </td>
                        @endif
                    </tr>
                    @empty

                    @endforelse
                    @push('AjaxScript')

                    <script  type="text/javascript">
                    function editpaymentMethod(id) {
                            $('#edit-payment-method').modal('show');
                            var currentName=$(".paymentMethod_"+id+" .paymentMethod_name").text();
                            var currentDisplayName=$(".paymentMethod_"+id+" .paymentMethod_display_name").text();
                            var currentCountry=$(".paymentMethod_"+id+" .paymentMethod_country").text();

                            var currentMin=$(".paymentMethod_"+id+" .paymentMethod_min").text();
                            var currentMax=$(".paymentMethod_"+id+" .paymentMethod_max").text();

                            $("#payment-method-input-name").val(currentName);
                            $("#payment-method-input-country").val(currentCountry);
                            $("#payment-method-input-min").val(currentMin);
                            $("#payment-method-input-max").val(currentMax);
                            $("#payment-method-input-id").val(id);
                            $("#payment-method-input-display-name").val(currentDisplayName);


                            $('#ajaxEditPaymentMethod').click(function(e) {
                                $("#payment-method-form").submit();
                            });
                            }
                    </script>
                    @endpush


                </tbody>
              </table>


            </div>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
    </div>
  </div>


    @push('QuantumAlertCSS')
    <script src="{{ url('backend/vendors/quantum-alert/quantumalert.css') }}"></script>
    @endpush

    @push('QuantumAlertJS')
    <script src="{{ url('backend/vendors/quantum-alert/quantumalert.js') }}"></script>
    @endpush

@endsection

