<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    // ===============================================================
    // product details CRUD start ====================================
    // ===============================================================

    public function addProductDetails(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'productName' => 'required',
                'productCategory' => 'required',
                'productQuantityInStore' => 'required',
                'productOriginalPrice' => 'required',
                'productNewPrice' => 'required',
                'description' => 'required',
                'productPicture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            if($validator->fails()){
                return response()->json(['msg' => 'fail', 'reason' => $validator->errors()->all()]);
            }

            $image = $request->file('productPicture');
            $productPicture = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/products'), $productPicture);

            DB::table('product_details')->insertGetId([
                'productName' => $request->productName ,
                'productCategory' => $request->productCategory ,
                'productQuantityInStore' => $request->productQuantityInStore ,
                'productQuantity' => 1 ,
                'productOriginalPrice' => $request->productOriginalPrice ,
                'productNewPrice' => $request->productNewPrice ,
                'description' => $request->description ,
                'productPicture' => $productPicture ,
                'status' => 1 ,

            ]);
            return response()->json(['msg' => 'success']);

        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' => [$e->getMessage()]]);
        }
    }

    public function viewProductDetails (Request $request){
        try{
            $allDatas = DB::table('product_details')->select('*')->where(['status' => 1])->get();
            foreach($allDatas as $data){
                $data->imageUrl = asset('uploadDocuments/products/' . $data->productPicture); 
            }
            return response()->json(['msg' => 'success', 'data' => $allDatas]);

        }catch(\Exception $e){
            return response()->json(['msg' => 'fail', 'reason' => [$e->getMessage()]]);
        }
    }


    public function updateProductDetails(Request $request)
    {

        try {
            if ($request->upload == 'yes') {
                $request->validate([
                    'productName' => 'required',
                    'productCategory' => 'required',
                    'productQuantityInStore' => 'required',
                    'productOriginalPrice' => 'required',
                    'productNewPrice' => 'required',
                    'description' => 'required',
                    'productPicture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                ]);

                $image = $request->file('productPicture');
                $productPicture = 'FILE_' . time() . $image->getClientOriginalExtension();
                $image->move(public_path('uploadDocuments/products'), $productPicture);
    
            } else {
                $request->validate([
                    'productName' => 'required',
                    'productCategory' => 'required',
                    'productQuantityInStore' => 'required',
                    'productOriginalPrice' => 'required',
                    'productNewPrice' => 'required',
                    'description' => 'required',
                ]);
                $productPicture = $request->hiddenProductPicture;
            }
            DB::table('product_details')->where('id', $request->id)->update([
                'productName' => $request->productName ,
                'productCategory' => $request->productCategory ,
                'productQuantityInStore' => $request->productQuantityInStore ,
                'productOriginalPrice' => $request->productOriginalPrice ,
                'productNewPrice' => $request->productNewPrice ,
                'description' => $request->description ,
                'productPicture' => $productPicture ,
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function deleteProductDetails(Request $request)
    {
        try {
            DB::table('product_details')->where('id', $request->id)->update([
                'status' => 0
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    // ===============================================================
    // product details CRUD start ====================================
    // ===============================================================

}
