<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\OffersNotification;
// use MBarlow\Megaphone\Types\BaseAnnouncement;
// use MBarlow\Megaphone\Types\General;
use MBarlow\Megaphone\Types\Important;
// use MBarlow\Megaphone\Types\NewFeature;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        return view('product');
    }
    
    public function sendOfferNotification() {
        $userSchema = User::first();
  
        $offerData = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
  
        // Notification::send($userSchema, new OffersNotification($offerData));

        
        $notification = new \MBarlow\Megaphone\Types\Important(
            'Hello',
            'GHellooe'
        );

        $user = \App\Models\User::find(1);

        $user->notify($notification);

        //$user->notify($offerData);

        dd('Task completed!');
    }
}