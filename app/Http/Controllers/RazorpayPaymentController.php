<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
// use Session;
use Exception;
use Illuminate\Support\Facades\Session;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Payment;

class RazorpayPaymentController extends Controller
{
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('razorpayView');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));






        // // ==================================================

        // $orderData = [
        //     'receipt'         => 'rcptid_11',
        //     'amount'          => (5000*100),
        //     'currency'        => 'INR'
        // ];

        // $razorpayOrder = $api->order->create($orderData);


        // // =========================================







        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>10000));
                return $response;

            } catch (Exception $e) {
                return  $e->getMessage();
                // Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        // Session::put('success', 'Payment successful');
        // return redirect()->back();
    }










    public function testview(){
        return view('testrz');
    }

    public function mPaym(){
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $orderData = [
            'receipt'         => 'User_id',
            'amount'          => (5000*100),
            'currency'        => 'INR',
            'notes'           => [
                'order_id' => "1",       /////my custom info array
                'user_id'  => "1",

            ],
        ];

        $razorpayOrder = $api->order->create($orderData);
        $user_info=[
            'name'=>'Amit mondal',
            'mobile'=>7890833920,
            'email'=>'amit@gmail.com'
        ];
        $data=[
            'ezorder'=>$razorpayOrder,
            'user_info'=>$user_info
        ];

        return view('testrz')->with($data);
    }






    // ============================================================



    // ==============================================================


    public function initiate()
    {
        return view('paytm');
    }

    public function pay(Request $request)
    {
        $amount = 5000; //Amount to be paid

        $userData = [
            'user_id'=>1,
            'fee'=>$amount,
            'order_id'=>"123_".rand(1,1000), ///create_random unic new
            'year'=>"2",
            'pay_date'=>date("Y-m-d"),
        ];

        $paytmuser = Payment::create($userData); // creates a new database record

        $payment = PaytmWallet::with('receive');

        $payment->prepare([
            'order' => $userData['order_id'],
            'user' => 1,
            'mobile_number' => '1234567890',
            'email' => "amit.offici@gmail.com", // your user email address
            'amount' => $amount, // amount will be paid in INR.
            'callback_url' => route('status') // callback URL
        ]);
        return $payment->receive();  // initiate a new payment
    }

    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response();

        $order_id = $transaction->getOrderId(); // return a order id

        $transaction->getTransactionId(); // return a transaction id

        // update the db data as per result from api call
        if ($transaction->isSuccessful()) {
            Payment::where('order_id', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('initiate.payment'))->with('message', "Your payment is successfull.");

        } else if ($transaction->isFailed()) {
            Payment::where('order_id', $order_id)->update(['status' => 0, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('initiate.payment'))->with('message', "Your payment is failed.");

        } else if ($transaction->isOpen()) {
            Payment::where('order_id', $order_id)->update(['status' => 2, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('initiate.payment'))->with('message', "Your payment is processing.");
        }
        $transaction->getResponseMessage(); //Get Response Message If Available

        // $transaction->getOrderId(); // Get order id
    }
}
