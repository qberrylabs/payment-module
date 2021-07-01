<?php

namespace Modules\PaymentMethodeModule\Entities;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{   
    protected $fillable = [
        'name','display_name', 'country','min','max'
    ];
}
