<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products =  Product::all();

            if ($products) {
                return response()->json(['code'=> Response::HTTP_OK ,
                'message'=>'Return products', 'data'=>$products], Response::HTTP_OK );
            }else{
                return response()->json(['code'=> Response::HTTP_NO_CONTENT,
                'message'=>'Not return products'], Response::HTTP_NO_CONTENT);
            }
        } catch (Exception $e) {
            response()->json(['code'=> Response::HTTP_INTERNAL_SERVER_ERROR ,'message'=>'Internal Server'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $product = new Product();
            $product->code = $request->code;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->amount = $request->amount;
            $product->purchase_price = $request->purchase_price;
            $product->sale_price = $request->sale_price;
            $product->save();

            return response()->json(['code'=> Response::HTTP_OK,'message'=>'Product saved correctly'], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json(['code'=> Response::HTTP_INTERNAL_SERVER_ERROR ,'message'=>'Product not saved correctly'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $product = Product::where('code',$request->id)->first();

            if ($request->has('data.name')) {
                $product->name = $request->data['name'];
            }
            
            if ($request->has('data.description')) {
                $product->name = $request->data['description'];
            }

            if ($request->has('data.amount')) {
                $product->name = $request->data['amount'];
            }

            if ($request->has('data.purchase_price')) {
                $product->name = $request->data['purchase_price'];
            }

            if ($request->has('data.sale_price')) {
                $product->name = $request->data['sale_price'];
            }
            
            $product->save();

            return response()->json(['code'=> Response::HTTP_OK,'message'=>'Product update correctly'], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json(['code'=> Response::HTTP_INTERNAL_SERVER_ERROR ,'message'=>'Product not update correctly'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::where('code',$id)->first();
            $product->delete();

            return response()->json(['code'=> Response::HTTP_OK,'message'=>'Product delete correctly'], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['code'=> Response::HTTP_INTERNAL_SERVER_ERROR ,'message'=>'Product not update correctly'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }
}
