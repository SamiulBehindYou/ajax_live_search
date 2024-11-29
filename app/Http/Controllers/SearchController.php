<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function view(){
        $products = Product::paginate(20);
        return view('search.live_serach', compact('products'));
    }

    public function searching(Request $request){
        $products = Product::where('name', 'like', '%'.$request->search.'%')->get();
        $output = "";
        foreach($products as $index=>$product){
            $sl = $index+1;
            $output.=   '<tr>
                            <td>'.$sl.'</td>
                            <td>'.$product->name.'</td>
                            <td>'.$product->email.'</td>
                            <td>'.$product->phone.'</td>
                        </tr>';
        }
        return response($output);
    }
}
