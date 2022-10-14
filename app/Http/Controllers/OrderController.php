<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\OrderRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return View('orders.orderList', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('orders.orderAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        Order::create([
            'productName' => $request->productName,
            'unitPrice' => $request->unitPrice,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'deliveryDate' => $request->deliveryDate,
            'status' => $request->status
        ]);
        return redirect(route('order.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.orderEdit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $requestData = [
            'productName' => $request->productName,
            'unitPrice' => $request->unitPrice,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'deliveryDate' => $request->deliveryDate,
            'status' => $request->status,
        ];

        $order->update($requestData);

        return redirect()->route('order.index');
    }
    public function downloadPdf()
    {
        $orders = Order::all();
        #dd($orders);
        $pdf = Pdf::loadView('orders.pdf', compact('orders'));
        return $pdf->download('order.list.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $singleOrder = Order::find($id);
        $singleOrder->delete();
        return redirect()->route('order.index');
    }
}
