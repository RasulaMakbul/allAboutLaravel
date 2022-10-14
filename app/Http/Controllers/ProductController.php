<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #orderBy('id', 'desc')
        $products = Product::latest()->paginate(15);
        return view('products.productList', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('categoryName', 'id')->toArray();
        return view('products.productAdd', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::create([
            'productName' => $request->productName,
            'categoryID' => $request->categoryID,
            'unitPrice' => $request->unitPrice,
            'stock' => $request->stock,
            'unit' => $request->unit,
            'description' => $request->description,
            'color' => $request->color,
            'brand' => $request->brand
        ]);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        #dd($product->category->categoryName);
        #return view('product.show',compact('product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('categoryName', 'id')->toArray();
        return view('Products.productEdit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $requestData = [
            'productName' => $request->productName,
            'categoryID' => $request->categoryID,
            'unitPrice' => $request->unitPrice,
            'stock' => $request->stock,
            'unit' => $request->unit,

            'description' => $request->description,
            'color' => $request->color,
            'brand' => $request->brand

        ];
        $product->update($requestData);
        return redirect()->route('product.index');
    }

    public function downloadPdf()
    {
        $products = Product::all();
        #dd($orders);
        $pdf = Pdf::loadView('products.pdf', compact('products'));
        return $pdf->download('products.list.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();
        return redirect()->route('product.index');
    }

    public function trash()
    {
        $products = Product::onlyTrashed()->get();
        return view('products.trash', compact('products'));
    }

    public function restore($id)
    {
        $products = Product::onlyTrashed()->find($id);
        $products->restore();

        return redirect()
            ->route('product.trash');
    }

    public function delete($id)
    {
        try {
            $products = Product::onlyTrashed()->find($id);
            $products->forceDelete();

            return redirect()
                ->route('product.trash')
                ->withMessage('Successfully deleted');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
