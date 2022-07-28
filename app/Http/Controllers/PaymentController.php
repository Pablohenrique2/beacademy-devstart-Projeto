<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\IFTTTHandler;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    
    private $gateway;
    public $request_id;
    

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    
    {   
           
        
        
        
        
                
                
        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();
            

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

            
           

        } catch (\Throwable $th) {
            return $th->getMessage();
        } 
        
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save(); 
                ModelsRequest::where('user_id', Auth::id())
                ->where('status', 'RE')
                ->update(['status' => 'PA']);

                DB::table('requests')
                ->join('order_items', function ($join) {
                    $join->on('order_items.request_id', '=', 'requests.id')
                         ->where('requests.user_id', '=',Auth::id())
                         ->where('order_items.status', '=','RE'); 
                         
                })->update(['order_items.status' => "PA"]);


                return redirect()->route('shoppingCart')->with('compraOk', 'Compra concluída com sucesso!');

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        return 'User declined the payment!';   
    }
}
