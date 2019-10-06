<?php

namespace App\Http\Controllers;

use App\User;
use App\Booking; 
use Illuminate\Http\Request;
class BookingController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $this->authorize('view', Booking::class); 

        $user = User::all();  
        // $booking = Booking::with('User')->paginate(6);
        $booking = Booking::where('status',2)->paginate(6); //tambahin 0 2 3

        // $customerActive = Customer::where('active',1)->get();  
        // $user =User::where('status' ,'!=',4)->get();
        // $customer = Customer::where('active',1)->get(); 
         

        // return view('booking.index',compact('user'));

        return view('booking.index',[//pergi ke home
            'user' => $user,//bawa value user
            'bookings'=>$booking, 
        ]);
    }

    public function history()
    {   
        // $this->authorize('view', Booking::class); 

        $user = User::all();
        
         if ($booking = Booking::where('status',1)->paginate(6)); //ini 1 4
         else 
         ($booking = Booking::where('status',4)->paginate(6));
        // $user =User::where('status' ,4);
        // dd($user->name);
        // return view('booking.index',compact('user')); 

        return view('booking.index',[//pergi ke home
            'user' => $user,//bawa value user
            'bookings'=>$booking, 
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $user = User::all();
        return view('booking.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        // dd(request()->all());
        auth()->user()->booking()->create($this->validateRequest()); 
        return redirect('booking')->with('message','booking successfully created');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * 
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    { 
        $user = User::all();
        return view('booking.edit',compact('user','booking'));
    }
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {  
        $booking->update($this->validateRequest()); 
        return redirect('/booking/');
    }
    public function updateStatus(Request $request, Booking $booking)
    {   
        
        $data = request()->validate([
            'status'=>'required',
        ]);
        // dd($data);
        $booking->update($data); 
        return redirect('/booking/');
    }
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    private function validateRequest(){
        return request()->validate([ 
            'necessity'=>'required',
            'unit'=>'required',
            'reserve_date'=>'required',
            'reserve_start'=>'required',
            'reserve_end'=>'required',
       ]);
   }
 
}
