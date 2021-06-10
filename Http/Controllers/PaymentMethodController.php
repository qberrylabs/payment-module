<?php

namespace Modules\PaymentMethodeModule\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CoreModule\Entities\Country;
use Illuminate\Http\Request;
use App\Traits\ClearsResponseCache;
use Modules\PaymentMethodeModule\Entities\PaymentMethod;

class PaymentMethodController extends Controller
{
    use ClearsResponseCache;
    private $viewURL="paymentmethodemodule::payment_methods.";

    public function index()
    {
        $paymentMethods=PaymentMethod::orderBy('id','DESC')->get();

        $countries=Country::where('is_active','1')->get();

        return view($this->viewURL.'index',['paymentMethods'=>$paymentMethods,'countries'=>$countries]);
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'country' => 'required', 'string',
        ]);

        if(PaymentMethod::where('name',$request['name'])->where('country',$request['country'])->count() == 0){
            $input = $request->all();
            $paymentMethod = PaymentMethod::create($input);

            echo "
            <tr class='paymentMethod_{$paymentMethod->id}'>
                <td>#{$paymentMethod->id}</td>
                <td class='paymentMethod_name'>{$paymentMethod->name}</td>
                <td class='paymentMethod_display_name'>{$paymentMethod->display_name}</td>
                <td class='paymentMethod_country'>{$paymentMethod->country}</td>
                <td class='paymentMethod_min'>{$paymentMethod->min}</td>
                <td class='paymentMethod_max'>{$paymentMethod->max}</td>
                <td>
                <a class='btn btn-primary' href='javascript:;' onclick='editpaymentMethod({$paymentMethod->id})'>Edit</a>
                </td>
            </tr>
            " ;
        }else{
            echo "<script>Qual.warningd('Warning', 'This Payment Method Already Exists');</script>";
        }
    }


    public function update(Request $request)
    {
        $id=$request['payment-method-id'];

        $this->validate($request, [
            'name'=> 'required | unique_with:payment_methods,country,'.$id,
            'country' => 'required',
        ]);
        $paymentMethod = PaymentMethod::find($id);
        $input = $request->all();
        $paymentMethod->update($input);
        return redirect()->route('admin.PaymentMethod')->with('success','Payment Method updated successfully');
    }


    public function destroy($id)
    {
        //
    }
}
