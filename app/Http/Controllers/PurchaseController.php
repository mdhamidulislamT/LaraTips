<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $warehouses = Warehouse::all();
        return view('add-to-cart', compact('products','warehouses'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->productId;
        $product = Product::find($productId);
        if (Session::get('sale_cart_array')) {
            foreach (Session::get('sale_cart_array') as $keys => $value) {
                if (Session::get('sale_cart_array')[$keys]['product_id'] == $productId) {
                    return response()->json(["result" => "Add To Cart"]);
                }
            }
        }
        $cart_array = [
            'product_id'    =>  $product->id,
            'warehouse_id'  =>  $request->warehouse_id,
            'title'         =>  $product->title,
            'stock_quantity' =>  $product->quantity,
            'quantity'      =>  $request->quantity,
            'price'         =>  $product->price,
            'subtotal'      => ($product->price * $request->quantity)
        ];
        Session::push('sale_cart_array', $cart_array);
        return response()->json(["result" => "Add To Cart"]);
    }

    public function fetchCart(Request $request)
    {
        $rows = '';
        if (Session::get('sale_cart_array')) {
            $i = 1;
            $totalAmount = 0;
            foreach (Session::get('sale_cart_array') as $keys => $value) {
                $product_id = Session::get('sale_cart_array')[$keys]['product_id'];
                $warehouse_id = Session::get('sale_cart_array')[$keys]['warehouse_id'];
                $totalAmount += Session::get('sale_cart_array')[$keys]['price'] * Session::get('sale_cart_array')[$keys]['quantity'] ;
                $rows .= '<tr><th scope="row">' . $i++ . '</th><td>' . Session::get('sale_cart_array')[$keys]['title'] . '<td id="stock_quantity_' . $product_id . '">' . Session::get('sale_cart_array')[$keys]['stock_quantity'] . '</td></td>
                <td><div class="d-flex"><button type="button" class="btn btn-warning fs-4" onclick="updateQuantity(' . $product_id . ',' . $warehouse_id . ',' . false . ')">-</button><input type="number" class="form-control" id="quantity_' . $product_id . '" value="' . Session::get('sale_cart_array')[$keys]['quantity'] . '" onblur="calculateQuantity(' . 'this.value' . ',' . $product_id . ',' . $warehouse_id . ')"><button type="button" class="btn btn-success fs-5" onclick="updateQuantity(' . $product_id . ',' . $warehouse_id . ',' . true . ')">+</button></div></td>
                <td><input type="number" class="form-control" id="price_' . $product_id . '" value="' . Session::get('sale_cart_array')[$keys]['price'] . '"></td>
                <td id="subtotal_' . $product_id . '">' . Session::get('sale_cart_array')[$keys]['subtotal'] . '</td>
                <td><button type="button" class="btn btn-danger" onclick="removeCartProduct(' . $product_id . ')">remove</button></td>';
            }
            $rows .= '<tr class="table-active"><td></td><td></td><td></td><td></td><td>totalAmount </td><td id="totalAmount">'.$totalAmount.'</td><td></td></tr>';
        }
        return response()->json(["saleCart" => $rows]);
    }

    public function updateCart(Request $request)
    {
        $productId = $request->productId;
        $warehouse_id = $request->warehouse_id;
        $quantity = $request->quantity;
        if (Session::get('sale_cart_array')) {
            foreach (Session::get('sale_cart_array') as $keys => $value) {
                if (Session::get('sale_cart_array')[$keys]['product_id'] == $productId && Session::get('sale_cart_array')[$keys]['warehouse_id'] == $warehouse_id) {
                    $subtotal = Session::get('sale_cart_array')[$keys]['price'] * $quantity;
                    session()->put("sale_cart_array." . $keys . ".quantity", $quantity);
                    session()->put("sale_cart_array." . $keys . ".subtotal", $subtotal);
                }
            }
        }
        return response()->json(["result" => "Updated Purchase Cart"]);
    }

    public function removeProduct(Request $request)
    {
        $cartData = Session::get('sale_cart_array');
        $result = "";
        foreach (Session::get('sale_cart_array') as $keys => $value) {
            if (Session::get('sale_cart_array')[$keys]['product_id'] == $request->id) {
                unset($cartData[$keys]);
                Session::put('sale_cart_array', $cartData);
                $result = "Remove Product From Cart";
            }
        }
        return response()->json(["result" => $result]);
    }

    public function clearCart()
    {
        Session::forget('sale_cart_array');
        return response()->json(["result" => "Clear Cart"]);
    }
}
