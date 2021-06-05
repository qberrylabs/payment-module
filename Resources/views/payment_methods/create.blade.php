@can('payment-method-create')
<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Create Payment Method</button>

<div id="modal" class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">

    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Create Payment Method</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
    </div>
    <form  class="form-horizontal form-label-left" novalidate>
        @csrf
    <div class="modal-body">


        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
            <input  class="form-control" id="name"  name="name" placeholder="" required="required" type="text">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Display Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
            <input  class="form-control" id="display_name"  name="display_name" placeholder="" required="required" type="text">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="country"> Country <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
            {{-- <input  class="form-control" id="country"  name="country" placeholder="" required="required" type="text"> --}}
            <select  class="form-control select-builder" id="country" data-width="100%" name="country" placeholder="" required="required" >
                <option></option>
                @foreach ($countries as $country)
                {{-- <option  value="{{ $country->name }}" @if ($country->name == $userApplication->country) selected @endif> {{ $country->name }}</option> --}}
                <option  value="{{ $country->name }}"> {{ $country->name }}</option>
                @endforeach
            </select>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="min">Min<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
            <input  class="form-control" id="min"  name="min" placeholder="" required="required" type="number">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="max">Max<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
            <input  class="form-control" id="max"  name="max" placeholder="" required="required" type="number">
            </div>
        </div>



    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button"  id="ajaxAddPaymentMethod" class="btn btn-primary">Save changes</button>
    </div>
    @push('AjaxScript')

    <script type="text/javascript">

            $('#ajaxAddPaymentMethod').click(function(e) {
                //var id=$(this).data("id");
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'post'
                    , url: "/payment-methods/store"
                    , cache: false
                    , data: {
                        "_token": "{{ csrf_token() }}",
                        name: $('#name').val(),
                        display_name:$('#display_name').val(),
                        country: $('#country').val(),
                        min: $('#min').val(),
                        max: $('#max').val()
                    , }
                    , success: function(result) {
                        console.log("success");
                        $("#paymentMethods_items").prepend(result);
                        $('#modal').modal('hide');

                    }
                    , error: function(result) {
                        console.log("error");
                    }

                });
            });


    </script>
    @endpush
    </form>

    </div>
</div>
</div>
@endcan


