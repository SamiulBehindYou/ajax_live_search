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
        $searchable = $request->search;
        if($searchable){
            $products = Product::where(function($query) use ($searchable){
                $query->where('name', 'like', "$searchable%")
                    ->orWhere('email', 'like', "$searchable%");
            })->paginate(10);
            $output = "";
            $page = $request->get('page');
            if($products->lastPage() >= $page){
                foreach($products as $index=>$product){
                    if($page){
                        $sl = $index + ($page * 10) - 9;
                    }else{
                        $sl = $index + 1;
                    }
                    $output.=   '<tr>
                                    <td>'.$sl.'</td>
                                    <td>'.$product->name.'</td>
                                    <td>'.$product->email.'</td>
                                    <td>'.$product->phone.'</td>
                                </tr>';
                }
            }else{
                $output.=   "<tr>
                                <td colspan='4'>No Data found!</td>
                            </tr>";
            }

            return response($output);
        }
    }
}
