<form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}">
    {{ csrf_field() }}
    <input id="amount" type="hidden" class="form-control" name="amount">

    <button type="submit" class="">
        Pay with Paypal
    </button>
</form>

