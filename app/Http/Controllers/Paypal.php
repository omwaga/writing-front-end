<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class Paypal extends Controller
{
    private $_api_context;

    public function __construct()
    {
        $paypal_configuration = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }


    public function postPaymentWithpaypal(Request $request)
    {
        $price = $request->get('price');
        $orderNumber = $request->get('orderNumber');
        session(['orderNumber' => $orderNumber]);
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Order #' . $orderNumber)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($price);

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($price);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Pay for your order on Essayflame.');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (PPConnectionException $ex) {
            if (Config::get('app.debug')) {
                Session::put('error', 'Connection timeout');
            } else {
                session()->put('error', 'Some error occur, sorry for inconvenient');

            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }

        Session::put('error', 'Unknown error occurred');
    }

    public function getPaymentStatus(Request $request)
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            Session::put('error', 'Payment failed');
            Controller::createNotification(['notification' => "Payment failed !!", "for" => @Auth::user()->id]);
            return view('payment.payment-failed');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            Session::put('success', 'Payment success !!');
            $orderNumber = \session()->get('orderNumber');

            Controller::createNotification(['notification' => "Payment for order ".$orderNumber." successful !!", "for" => @Auth::user()->id]);

            $order = Order::find($orderNumber);
            $order->draft = 0;
            $order->bidding = 1;
            $order->update();
            return view('user.order-success');
        }

        Session::put('error', 'Payment failed !!');

        Controller::createNotification(['notification' => "Payment failed !!", "for" => @Auth::user()->id]);


        return view('payment.payment-failed');
    }
}
