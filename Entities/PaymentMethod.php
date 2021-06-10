<?php

namespace Modules\PaymentMethodeModule\Entities;

use App\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use ClearsResponseCache;
    
    protected $fillable = [
        'name','display_name', 'country','min','max'
    ];
}
