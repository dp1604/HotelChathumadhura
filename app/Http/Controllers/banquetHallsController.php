<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banquetHallReservations;
use App\halls;

class banquetHallsController extends Controller
{
    public function store(Request $request){
        $hallReservation = new banquetHallReservations;

        $hallReservation -> hallId = $request -> halls;
        $hallReservation -> reservationDate = $request -> date;
        $hallReservation -> package = $request -> package;
        $hallReservation -> customerName = $request -> customerName;
        $hallReservation -> customerEmail = $request -> email;
        $hallReservation -> customerMobile = $request -> mobile;
        $hallReservation -> status = "PENDING";

        $hallReservation -> save();

        $list = banquetHallReservations::all();
        return view('banquetHallReservationsList') -> with('list',$list);
    }

    public function viewReservation(Request $request){
        $reservation = banquetHallReservations::find($request -> id);
        //$reservation = $request -> id;
        return view('addReservation') -> with('reservation',$reservation);
    }

    public function getReservationList(){
        $list = banquetHallReservations::all();
        return view('banquetHallReservationsList') -> with('list',$list);
    }

    public function goToReserve(){

            $hallReservation = new banquetHallReservations;
            return view('addReservation') -> with('reservation',$hallReservation);

    }

    //go to detailed view of order
    public function viewDetails($id){
        $order = Order::find($id);
        $ordeCode = $order -> orderCode;
        $order_item_list = order_item::all();


      return view('orderDetails')->with('orderData',$order)->with('itemList',$order_item_list) ->with('oc',$ordeCode);


    }

    public  function updateStatus(Request $request) {
        $order = Order::find($request->oid);
        $order->orderStatus = $request->orderStatus;
        $order->save();
        $allData = order::all();
        return view('orderList') -> with('orders',$allData);



    }

    public function findOrder(Request $request){
        $id = $request->oid;

        $order = Order::find($id);
        $ordeCode = $order -> orderCode;
        $order_item_list = order_item::all();


        return view('updateOrders')->with('orderData',$order)->with('itemList',$order_item_list) ->with('oc',$ordeCode);


    }

    public function updateReservation(Request $request){
        $id = $request -> id;
        $hallReservation = banquetHallReservations::find($id);

        $status = $hallReservation -> status;
        $hallReservation -> hallId = $request -> halls;
        $hallReservation -> reservationDate = $request -> date;
        $hallReservation -> package = $request -> package;
        $hallReservation -> customerName = $request -> customerName;
        $hallReservation -> customerEmail = $request -> email;
        $hallReservation -> customerMobile = $request -> mobile;
        $hallReservation -> status = $status;

        $hallReservation -> save();
        $list = banquetHallReservations::all();
        return view('banquetHallReservationsList') -> with('list',$list);
    }

    public function deleteReservation(Request $request){

            $id = $request -> id;
            $reservation = banquetHallReservations::find($id);
            $reservation->delete();

            $list = banquetHallReservations::all();
            return view('banquetHallReservationsList') -> with('list',$list);

    }

    public function bill(Request $request){
        $id = $request->oid;
        $order = Order::find($id);
        $ordeCode = $order -> orderCode;
        $order_item_list = order_item::all();

        return view('foodBill')->with('orderData',$order)->with('itemList',$order_item_list) ->with('oc',$ordeCode);

    }
}
