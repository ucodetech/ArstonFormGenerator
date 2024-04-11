<?php

namespace App\Traits;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait WithCart
{
    public User $user;
    public string $response = '';
    public function add(array $cart_data)
    {
        $product = Product::getProductById($cart_data['product_id']);
        if ($product->stock < 1):
            $this->response = 'Product is out of stock!';
            return false;
        endif;
        $this->response = '';

        $storedCart = Cart::where(['product_id'=> $cart_data['product_id'], 'user_id' => $cart_data['user_id']])->first();
        if ($storedCart):
            $storedCart->quantity =  $storedCart->quantity+1;
            if ($cart_data['size']){
                $storedCart->size = $cart_data['size'];
            }
            $storedCart->save();
            $this->response = 'Cart updated!';
        else:
            $cart = new Cart();
            $cart->user_id = $cart_data['user_id'];
            $cart->unique_id = $cart_data['unique_id'];
            $cart->product_id = $cart_data['product_id'];
            $cart->product_name = $cart_data['product_name'];
            $cart->price = $cart_data['price'];
            $cart->quantity = $cart_data['quantity'];
            $cart->size = $cart_data['size'];
            $cart->vendor_id = $cart_data['vendor_id'];
            $cart->created_at = $cart_data['created_at'];
            $cart->save();

        endif;


    }


    public function getCartContentProperty(){
        return Cart::where('user_id', auth()->user()->id);
    }

    public function cart_contents()
    {
        if(Auth::guard('web')->check()):
            $this->user = auth()->user();
            $cart_contents = $this->cartContent->get();
            if (count($cart_contents) > 0):
                $contents = $cart_contents;
            else:
                $contents = [];
            endif;

            return $contents;
        endif;
    }

//    public function cart_quantity($cart_id){
//        return Cart::where('id', $cart_id)->first('quantity');
//    }

    public function cart_subtotal(){
        $item_price = 0;
        foreach($this->cartContent->get() as $cont){
            $item_price += $cont->price * $cont->quantity;
        }
        return $item_price;
    }
    public function remove($uniqueId): void
    {
        $cartItem = Cart::getByUniqueId($uniqueId);
        if($cartItem) $cartItem->delete();
    }

    public function update($cartId, $action)
    {
        $cart = Cart::where('unique_id', $cartId)->first();
        $product = Product::getProductById($cart->product_id);
        if ($action === 'plus'):
            if ($cart->quantity >= $product->stock):
                $this->response = 'Product has ran of stock!';
                return false;
            endif;
            $this->response = '';
            if(count(hasProductAttribute($cart->product_id)) > 0):
                $prodAttr = ProductAttribute::where(['product_id'=>$product->id,'size'=> $cart->size])->first();
                if($cart->quantity >= $prodAttr->quantity){
                    $this->dispatch('notify-error', 'Product with this size is out of stock!');
                    return false;
                }
            endif;
            $cart->quantity +=1;
        elseif($action==='minus'):
            if($cart->quantity<=1):
                $this->response = 'Cart quantity can not be less than 1 ';
                return false;
            endif;
            $this->response = '';
            $cart->quantity -=1;
        endif;
        $cart->save();

    }


    public function wishlist(array $wishlist_data)
    {

        $this->response = '';

        $storedItem = Wishlist::where(['product_id'=> $wishlist_data['product_id'], 'user_id' => $wishlist_data['user_id']])->first();
        if ($storedItem):
            $this->response = 'Product already added to wishlist!';
            return false;
        else:
            $wishlist = new Wishlist();
            $wishlist->user_id = $wishlist_data['user_id'];
            $wishlist->product_id = $wishlist_data['product_id'];
            $wishlist->product_quantity = $wishlist_data['quantity'];
            $wishlist->created_at = $wishlist_data['created_at'];
            $wishlist->save();

        endif;

    }


}
