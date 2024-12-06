<?php

namespace App\Http\Controllers\Api;

use App\Models\Userdata;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserdataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserdataController extends Controller
{
    /** 
     * index 
     * 
     * @return void 
     */
    public function index()
    {
        //get all posts 
        $user = Userdata::latest()->paginate(5);

        //return collection of posts as a resource 
        return new UserdataResource(true, 'List Data Posts', $user);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name'     => 'required',
            'phone_number'     => 'required',
            'email'   => 'required',
            'post_code'   => 'required',
            'address'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $user = Userdata::create([
            'full_name'
            => $request->full_name,
            'phone_number'
            => $request->phone_number,
            'email'
            => $request->email,
            'post_code'
            => $request->post_code,
            'address'
            => $request->post_code,
        ]);
        //return response 
        return new UserdataResource(true, 'Data Post Berhasil Ditambahkan!', $user);
    }

    public function show($id)
    {
        //find post by ID 
        $user = Userdata::find($id);

        //return single post as a resource 
        return new UserdataResource(true, 'Detail Data Post!', $user);
    }

    function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'full_name'     => 'required',
            'phone_number'     => 'required',
            'email'   => 'required',
            'post_code'   => 'required',
            'address'   => 'required',
        ]);

        $user = Userdata::find($id);
        //update post without image
        $user->update([
            'full_name'
            => $request->full_name,
            'phone_number'
            => $request->phone_number,
            'email'
            => $request->email,
            'post_code'
            => $request->post_code,
            'address'
            => $request->post_code,
        ]);

        //return response
        return new UserdataResource(true, 'Data Post Berhasil Diubah!', $user);
    }

    function destroy($id)
    {

        //find post by ID
        $user = Userdata::find($id);

        //delete post
        $user->delete();

        //return response
        return new UserdataResource(true, 'Data Post Berhasil Dihapus!', null);
    }
} 
