@can('payment-method-edit')

<div id="edit-payment-method" class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">

    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit Payment Method</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
    </div>
    <form id="payment-method-form" class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('admin.payment-method.update') }}">
        @csrf
    <div class="modal-body">

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="hidden" id="payment-method-input-id" name="payment-method-id">
                <input  class="form-control" id="payment-method-input-name"  name="name" placeholder="" required="required" type="text" readonly>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">display_name <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input  class="form-control" id="payment-method-input-display-name"  name="display_name" placeholder="" required="required" type="text">
            </div>
        </div>



        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="country"> Country <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            {{-- <input  class="form-control" id="country"  name="country" placeholder="" required="required" type="text"> --}}
            <select  class="form-control select-builder" id="payment-method-input-country" data-width="100%" name="country" placeholder="" required="required" >
                <option></option>
                @foreach ($countries as $country)
                {{-- <option  value="{{ $country->name }}" @if ($country->name == $userApplication->country) selected @endif> {{ $country->name }}</option> --}}
                <option  value="{{ $country->name }}"> {{ $country->name }}</option>
                @endforeach
            </select>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Min <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input  class="form-control" id="payment-method-input-min"  name="min" placeholder="" required="required" type="number">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Max <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input  class="form-control" id="payment-method-input-max"  name="max" placeholder="" required="required" type="number">
            </div>
        </div>





    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button"  id="ajaxEditPaymentMethod" class="btn btn-primary">Save changes</button>
    </div>
    </form>

    </div>
</div>
</div>
@endcan


