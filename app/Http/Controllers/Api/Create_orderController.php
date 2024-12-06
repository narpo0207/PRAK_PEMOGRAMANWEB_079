<?php

namespace App\Http\Controllers\Api;

use App\Models\create_order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Create_orderResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class Create_orderController extends Controller
{

    /** 
     * index 
     * 
     * @return void 
     */
    public function index()
    {
        //get all posts 
        $order = create_order::latest()->paginate(5);

        //return collection of posts as a resource 
        return new Create_orderResource(true, 'List Data Posts', $order);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name'     => 'required',
            'project_description'     => 'required',
            'Total_cost'   => 'required',
            'project_status'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $order = create_order::create([
            'project_name'
            => $request->project_name,
            'project_description'
            => $request->project_description,
            'Total_cost'
            => $request->Total_cost,
            'project_status'
            => $request->project_status,
        ]);
        //return response 
        return new Create_orderResource(true, 'Data Post Berhasil Ditambahkan!', $order);
    }

    public function show($id)
    {
        //find post by ID 
        $order = create_order::find($id);

        //return single post as a resource 
        return new Create_orderResource(true, 'Detail Data Post!', $order);
    }

    function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'project_name'     => 'required',
            'project_description'     => 'required',
            'Total_cost'   => 'required',
            'project_status'   => 'required',
        ]);

        $order = create_order::find($id);
        //update post without image
        $order->update([
            'project_name'
            => $request->project_name,
            'project_description'
            => $request->project_description,
            'Total_cost'
            => $request->Total_cost,
            'project_status'
            => $request->project_status,
        ]);


        //return response
        return new Create_orderResource(true, 'Data Post Berhasil Diubah!', $order);
    }

    function destroy($id)
    {

        //find post by ID
        $order = create_order::find($id);

        //delete post
        $order->delete();

        //return response
        return new Create_orderResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
