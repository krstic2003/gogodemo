<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Price;
use App\Models\PriceCover;
use App\Models\User;
use App\Models\Order;
use App\Models\Settings;
use Yajra\DataTables\DataTables;
use Spatie\MediaLibrary\Support\ImageFactory;
use PDF;

class BookController extends Controller
{
    public function index(Request $request){

        $books = Book::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();

        foreach($books as $book){
            $book->status = 'Aktivan';

            if( Order::where('book_id', $book->id)->exists() ){
                $book->status = 'Poručen';
            }
        }

        return view('books', compact('books'));
    }

    public function createForm()
    {
        $prices_page = Price::all();
        $prices_cover = PriceCover::all();

        return view('create-book', compact('prices_page', 'prices_cover'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'format' => 'required',
            'cover' => 'required',
            'pages' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {

            return redirect(url()->previous())
                        ->withErrors($validator)
                        ->withInput();
        }

        $request['user_id'] = Auth::user()->id;
        $request['created_at'] = date('Y-m-d H:i:s');
        $request['updated_at'] = date('Y-m-d H:i:s');

        $book = Book::create($request->all());


        return  back()->with('status', 'Knjiga uspešno kreirana');
    }

    public function editForm($id)
    {
        $book = Book::findOrFail($id);
        $prices_page = Price::all();
        $prices_cover = PriceCover::all();

        return view('edit-book', compact('prices_page', 'prices_cover', 'book'));
    }

    public function edit(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'format' => 'required',
            'cover' => 'required',
            'pages' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {

            return redirect(url()->previous())
                        ->withErrors($validator)
                        ->withInput();
        }

        $request['updated_at'] = date('Y-m-d H:i:s');

        $book->update($request->all());


        return  back()->with('status', 'Knjiga uspešno ažurirana');
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return back()->with('status', 'Knjiga je uspešno obrisana.');
    }

    public function indexAdmin(Request $request){
        if (request()->ajax()) {

            /*----------  Make DataTable  ----------*/

            return DataTables::of(Book::select())
            ->addColumn('order_date', function ($book) {
                $order_date = '';

                if( Order::where('book_id', $book->id)->exists() ){
                    $order = Order::where('book_id', $book->id)->orderBy('id', 'desc')->first();
                    $order_date = date('d-m-Y H:i:s',strtotime($order->created_at));
                }

                return $order_date;
            })
            ->addColumn('order_name', function ($book) {
                $order_name = '';

                if( Order::where('book_id', $book->id)->exists() ){
                    $order = Order::where('book_id', $book->id)->orderBy('id', 'desc')->first();
                    $order_name = $order->shipping_name;
                }else{
                    $order_name = User::where('id',$book->user_id)->value('name');
                }

                return $order_name;
            })
            ->addColumn('order_tel', function ($book) {
                $order_tel = '';

                if( Order::where('book_id', $book->id)->exists() ){
                    $order = Order::where('book_id', $book->id)->orderBy('id', 'desc')->first();
                    $order_tel = $order->shipping_tel;
                }else{
                    $order_tel = User::where('id', $book->user_id)->value('telephone');
                }

                return $order_tel;
            })
            ->addColumn('payment', function ($book) {
                $payment = '';

                if( Order::where('book_id', $book->id)->exists() ){
                    $order = Order::where('book_id', $book->id)->orderBy('id', 'desc')->first();
                    $payment_short = $order->payment;
                    if( $payment_short == 'cod' ){
                        $payment = 'Pouzećem';
                    }elseif( $payment_short == 'ips' ){
                        $payment = 'Generisanjem IPS koda';
                    }else{
                        $payment = 'Generisanjem uplatnice';
                    }
                }

                return $payment;
            })
            ->addColumn('status', function ($book) {
                $status = 'Aktivan';

                if( Order::where('book_id', $book->id)->exists() ){
                    $order = Order::where('book_id', $book->id)->orderBy('id', 'desc')->first();
                    $status = 'Poručen';
                }

                return $status;
            })
            ->editColumn('pdf', function ($book) {
                $edit_btn = '<a href="book/'.$book->id.'/pdf">Kreiraj</a>';
                return $edit_btn;
            })
            ->editColumn('actions', function ($book) {
                $edit_btn = '<a href="open-book/'.$book->id.'">Otvori</a>';
                return $edit_btn;
            })
            ->editColumn('delete', function ($book) {
                $del_btn = '<a href="delete-book/'.$book->id.'">Obriši</a>';
                return $del_btn;
            })
            ->rawColumns(['pdf', 'actions', 'delete'])
            ->make();
        }

        return view('books-admin');
    }

    public function show($id)
    {
        $book = Book::where('id', $id)->first();
        $user = User::where('id', $book->user_id)->first();
        $settings = Settings::first();

        $status = 'Aktivan';

        if( Order::where('book_id', $book->id)->exists() ){
            $status = 'Poručen';
        }

        //dd($book->user_id);

        return view('show-book', compact('book', 'user', 'settings', 'status'));
    }

    public function orderBook($id)
    {
        $book = Book::where('id', $id)->first();
        $user = User::where('id', $book->user_id)->first();

        //dd($book->user_id);

        return view('order-book', compact('book', 'user'));
    }

    public function orderSubmit(Request $request, $id)
    {
        $request['book_id'] = $id;
        $request['status'] = 'Aktivan';
        $request['created_at'] = date('Y-m-d H:i:s');
        $request['updated_at'] = date('Y-m-d H:i:s');

        $order = Order::create($request->all());

        $order_id = $order->id;

        //send email
        $to_name = $request['shipping_name'];
        $to_email = $request['shipping_email'];

        $payment = $request['payment'];
        $settings = Settings::first();
        $book = Book::where('id', $id)->first();

        if( $payment == 'cod' ){
            $data = array(
                "name" => $to_name,
                "body" => "Uspešno ste poručili album. Metoda plaćanja: Prilikom preuzimanja."
            );
            \Mail::send("emails.mail", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Nova porudžbina');
                $message->from('no-reply@gogobook.com', 'GoGoBook');
            });

            return view('thank-you', compact('payment'));
        }elseif( $payment == 'ips' ){
            $data = array(
                "name" => $to_name,
                "body" => "Uspešno ste poručili album. Metoda plaćanja: IPS QR kod.",
                "bookid" => $id,
                "orderid" => $order_id
            );
            \Mail::send("emails.mail-ips", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Nova porudžbina');
                $message->from('no-reply@gogobook.com', 'GoGoBook');
            });

            return view('thank-you-ips', compact('settings', 'book', 'to_name'));
        }else{
            $data = [
                'account' => $settings->account,
                'to_name' => $to_name,
                'company' => $settings->company,
                'price' => number_format((float)$book->price, 2, ',', ''),
            ];
            $pdf = PDF::loadView('pdfslip', $data);
            $pdf_name = 'uplatnica-'.$id.'-'.date('Y-m-d-H-i-s');
            $pdf->save(public_path().'/pdf/'.$pdf_name.'.pdf');

            $data_email = array(
                "name" => $to_name,
                "body" => "Uspešno ste poručili album. Metoda plaćanja: Uplatnica.",
                "pdf_name" => $pdf_name
            );
            \Mail::send("emails.mail-invoice", $data_email, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Nova porudžbina');
                $message->from('no-reply@gogobook.com', 'GoGoBook');
            });

            return view('thank-you-invoice', compact('pdf_name'));
        }


    }

    public function generateIps($bid, $oid){
        $settings = Settings::first();
        $book = Book::where('id', $bid)->first();
        $order = Order::where('id', $oid)->first();

        return view('generate-ips', compact('settings', 'book', 'order'));
    }

    public function pixieBook($id)
    {
        $book = Book::where('id', $id)->first();
        //$user = User::where('id', $book->user_id)->first();
        //$settings = Settings::first();

        //dd($book->user_id);

        return view('pixie-book', compact('book'));
       // return redirect('/Strut/app/')->with(['book' => $book]);

    }
}
