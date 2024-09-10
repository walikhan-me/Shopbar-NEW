<?php

namespace App\Http\Controllers;
use App\Models\UserAdminCredential;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        
       
       
        $user_id = $request->user_id;

        // Fetch the user details using the UserAdminCredential model
        $user = UserAdminCredential::find($user_id);
    
        // print_r($user->id);
        // print_r($user->username);
        // print_r($user->useremail);
           
        if (!$user) {
      
            return redirect()->back()->withErrors(['error' => 'User not found']);
        }
        $order = Order::create([
            "user_name"=>$user->username,
            "user_email"=>$user->useremail,
            "product_name"=>$request->product_name,
            "product_price"=>$request->product_price,
            "paymnet_status"=>'pending',
            "user_id"=>$user->id,

        ]);

       if(!$order){
        return redirect()->back()->withErrors(['error' => 'User not found']);
       }
       
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $request->product_name,
                    ],
                    'unit_amount' => $request->product_price * 100, // Amount in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success',['order_id' => $order->id]),
            'cancel_url' => route('payment.cancel', ['order_id' => $order->id]),
        ]);

        return redirect($session->url);
    }


    public function success($order_id)
    {
        
        // Find the order by ID
        $order = Order::find($order_id);
       
        if ($order) {
            // Update the payment status to 'paid'
            $order->update([
                'paymnet_status' => 'paid',
            ]);

            return redirect()->route('User.User_dashboard')->with('success', 'Payment successful and order updated!');
        }

        return redirect()->route('User.User_dashboard')->withErrors(['error' => 'Order not found']);
    }

    public function cancel($order_id)
    {
        // No need to update as it remains 'pending' or 'unpaid'
        return redirect()->route('User.User_dashboard')->with('error', 'Payment was cancelled.');
    }
}

