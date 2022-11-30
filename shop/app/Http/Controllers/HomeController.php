<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\WebToPay;
use App\Models\Orders;


class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
 
    public function moketi(Request $request){
    
    
        try {             
         $request =  WebToPay::redirectToPayment(array(
                'projectid'     => 191183,
                'sign_password' => 'dc1c347d471f68e41ad2a9a1145941d6',
                'orderid'       => $request->orderid,
                'amount'        => $request->amount * 100,
                'currency'      => 'EUR',
                'country'       => 'LT',
                'accepturl'     => route('accept'),
                'cancelurl'     => route('cancel'),
                'callbackurl'   => route('callback'),
                'test'          => 1,
            ));
           return redirect($request);
        } catch (WebToPayException $e) {
            // handle exception
        }
       }
       public function accept() {
           $this->PaymentAccept(); // callback  remove in real website
           Session::put('payment', 1);
          return redirect(route('home'));
    
       }
       public function cancel() {
        Session::put('payment', 0);
        return redirect(route('home'));
    
    }
    
    
    
       public function PaymentAccept() {
    
        try{
            $response = WebToPay::checkResponse($_GET, array(
                'projectid' => 191183,
                'sign_password' => 'dc1c347d471f68e41ad2a9a1145941d6',
            ));
         
         
            $orderId = $response['orderid'];
            $amount = $response['amount'];
            $currency = $response['currency'];
            $order = Orders::where('id' , $orderId )->first();
            if($order->status == 1 && $amount == $order->price *  100  &&  $currency == "EUR" ) {
                $order->status = 2;
                $order->save();
            }
            //@todo: patikrinti, ar užsakymas su $orderId dar nepatvirtintas (callback gali būti pakartotas kelis kartus)
            //@todo: patikrinti, ar užsakymo suma ir valiuta atitinka $amount ir $currency
            //@todo: patvirtinti užsakymą
    
            // rasti avo duombazeje orderi ir jam pakeisti statusa i amoketa, kai padrai patikirinimus.
         
           
        } catch(Exception$e) {
            echo get_class($e) . ':' . $e->getMessage();
    
       }
    }
    

}
