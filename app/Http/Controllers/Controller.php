<?php

namespace App\Http\Controllers;

use App\Models\AssignedOrders;
use App\Models\BlockWriter;
use App\Models\CompletedOrder;
use App\Models\FavouriteWriter;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Post;
use App\Models\Writer;
use App\Models\WriterOrderFile;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Home()
    {
        $result = DB::table('settings_languages')
            ->orderBy('language')
            ->get();

        return view('index', ['types' => $result]);
    }

    public function WriterView($id)
    {
        $writer = Writer::whereId($id)->with(['ratings'])->first();
        return view('user.writers.view', compact('writer'));
    }

    public function WriterChat()
    {
        return view('writer.chats');
    }

    public function LogNotification()
    {
        $result = Notification::where('seen', false)
        ->where('for', Auth::user()->id)
        ->orWhere('for', null)
        ->orderBy('id', 'desc')
        ->limit(6)->select('id', 'notification')->get()->toArray();

        return response()->json(['notifications' => $result]);
    }

    public function WriterNotification()
    {
        $result = Notification::with(['intended'])
        ->where('seen', false)
        ->where('for', Auth::user()->id)
        ->orWhere('for', null)
        ->orderBy('id', 'desc')
        ->paginate(6);

        return view('writer.notifications', ['notifications' => $result]);
    }

    public function WriterNotificationSeen($id)
    {
        $result = Notification::findOrFail($id);

        $result->delete();

        session()->flash('message', 'Notification marked as seen!');
        return redirect()->back();
    }

    public function WriterRegistration(Request $request)
    {
        if (!(session()->has('end'))) {
            $end = Carbon::createFromFormat('Y-m-d H:i:s', now())->addMinutes(20);
            $request->session()->put('end', $end);
        }

        return view('auth.writer-registration');
    }

    public function OrderNow()
    {
        session()->flash('message', 'Sign in or create an account to make an order.');
        return view('auth.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function deleteOrder($orderId)
    {
        $files = DB::table('order_files')
            ->where('order_number', $orderId)
            ->get();

        foreach ($files as $f) {
            Storage::delete($f->file);
        }

        DB::table('orders')
            ->delete(['id' => $orderId]);

        return redirect()->to(route('drafts'));
    }

    public function downloadOrderFiles($orderNumber)
    {
        $files = DB::table('order_files')
            ->where('id', $orderNumber)
            ->get();

        foreach ($files as $file) {
            return response()->download(storage_path('app/' . $file->file));
        }
    }

    public function orderBids($orderNumber)
    {
        $bids = DB::table('bidding_orders')
            ->where('order_id', $orderNumber)
            ->paginate(6);

        return view('user.order-bids', ['bids' => $bids, 'orderNumber' => $orderNumber]);
    }

    public function rateWriter($orderNumber)
    {
        $order = Order::where('id', $orderNumber)
            ->with(['completedOrder'])
            ->first();

        $completed = CompletedOrder::where('order_id', $order)->first();
        $writer = new Writer();
        if($order->completedOrder){
            $writer = Writer::where('email', $order->completedOrder->email)->first();
        }else{
            abort(404);
        }

        return view('user.rate-writer', ['order' => $order, 'orderNumber' => $orderNumber, 'writer' => $writer]);
    }

    protected $rules = [
        'files.*' => 'mimes:zip,jpg,jpeg,png,xlsx,ppt,docx,pdf,zip'
    ];

    public function fileUpload(Request $request)
    {
        $file = $request->file('file');
        $orderNumber = $request->input('orderNumber');
        $path = $file->store('writer-order-files');

        $orderFile = new WriterOrderFile();
        $orderFile->order_number = $orderNumber;
        $orderFile->file = $path;
        $orderFile->save();

        $count = CompletedOrder::where('order_id', $orderNumber)->count();
        if ($count == 0) {
            $completed = new CompletedOrder();
            $completed->email = Auth::guard('writers')->user()->email;
            $completed->order_id = $orderNumber;
            $completed->save();

            $price = Order::find($orderNumber)->value('price');

            $account_balance = DB::table('writers')
                ->where('email', $request->input('email'))
                ->value('account_balance');

            $writerCut = $price * 0.3;

            $balance = $account_balance + $writerCut;
            Writer::where('email', $request->input('email'))->update(array('account_balance' => $balance));

            $completed_orders = Writer::where('email', $request->input('email'))->value('completed_orders');
            $completed_orders++;
            Writer::where('email', $request->input('email'))->update(['completed_orders' => $completed_orders]);
        }

        $order = Order::find($orderNumber);
        $order->in_progress = 0;
        $order->completed = 1;
        $order->bidding = 0;
        // $order->update();

    
        return response()->json(['success' => $path]);
    }

    public function blog()
    {
        $posts = Post::latest()->get();

        return view('blog', ['posts' => $posts]);
    }

    public function readBlog(Request $request)
    {
        $slug = $request->slug;

        $post = Post::where('slug', $slug)->get();

        return view('blog.read', ['post' => $post]);
    }

    public function blockWriter(Request $request)
    {
        $id = $request->id;

        $writer = Writer::find($id);
        $writerEmail = $writer->email;

        $count = DB::table('favourite_writers')
            ->where('email', $writerEmail)
            ->where('user_id', Auth::user()->id)
            ->count();

        if ($count > 0) {
            DB::table('favourite_writers')
                ->where('user_id', Auth::user()->id)
                ->where('email', $writerEmail)
                ->delete();
        }

        $count = DB::table('blocked_writers')
            ->where('user_id', Auth::user()->id)
            ->where('email', $writerEmail)
            ->count();

        if ($count == 0) {
            $writer = new BlockWriter();
            $writer->user_id = Auth::user()->id;
            $writer->email = Writer::where('id', $id)->value('email');
            $writer->save();
        }
        self::createNotification(['notification' => "You account has been blocked!", "for" => $writer->id]);


        session()->flash('message', 'Writer blocked successfully!');
        return redirect(route('writers'));

    }

    public function favouriteWriter(Request $request)
    {
        $id = $request->id;

        $writer = Writer::find($id);
        $writerEmail = $writer->email;
        $count = DB::table('favourite_writers')
            ->where('user_id', Auth::user()->id)
            ->where('email', $writerEmail)
            ->count();

        if ($count == 0) {
            $favouriteWriter = new FavouriteWriter();
            $favouriteWriter->user_id = Auth::user()->id;
            $favouriteWriter->email = $writerEmail;
            $favouriteWriter->save();
        }

        self::createNotification(['notification' => Auth::user()->name." added you as a favorite!", "for" => $writer->id]);

        session()->flash('message', 'Writer added to favourites successfully!');
        return redirect(route('writers'));
    }

    public function favouriteWriterRemove(Request $request)
    {
        $id = $request->id;

        $writer = Writer::find($id);
        $writerEmail = $writer->email;
        $count = DB::table('favourite_writers')
            ->where('user_id', Auth::user()->id)
            ->where('email', $writerEmail)
            ->count();

        if ($count != 0) {
            DB::table('favourite_writers')
                ->delete($id);
        }

        session()->flash('message', 'Writer removed from favourites!');
        return redirect(route('writers'));
    }

    function unblockWriter(Request $request)
    {
        $id = $request->id;

        $blocked = BlockWriter::whereId($id)->first();
        $writer = Writer::where('email', $blocked->email)->first();
        self::createNotification(['notification' => "You account has been unblocked!", "for" => $writer->id]);

        $blocked->delete();

        session()->flash('message', 'Writer unblocked successfully!');
        return redirect(route('writers'));
    }


    public static function createNotification($data)
    {
        $user = Auth::user() ?? Auth::guard('writers')->user();
        $data["user_id"] = $user->id;
        Notification::create($data);

        $notifications = DB::table('notifications')->orWhere('for', $user->id)->leftJoin('users', 'notifications.user_id', 'users.id')->select('notifications.id as id', 'notifications.notification', 'users.name as username', 'users.profile_photo_path as profile_photo_path')->orderBy('id', 'desc')->limit(5)->get();
        Session::put('notifications', $notifications);


    }
}
