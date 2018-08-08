<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\request1;
use App\trop;







class requestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $request = request1::join('trop','trop.tid', '=', 'request.object_id')
      ->select('request_id','trop.trop_name','request.request_detail','request.request_type','request.request_status','request.request_object','request.object_id','request_comment')
	  ->orderBy('request_status', 'ASC')
	  ->get();
       return view('admin.pages.request.request', ['request' => $request]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit1($id)
    {  //        $cat = category::join('trop','trop.tid', '=', 'category.tid')
		//    ->where('category.tid', '=', '1')
        //    ->select('catid','trop.trop_name','category.catid','category.cat_name','category.cat_type')
		//	  ->get();
		
		$ids = explode(',',$id);

		request1::where('request_id', $ids[0])
          ->update(['request_status' => '1']);
		  
		
          trop::where('tid', $ids[1])
          ->update(['trop_status' => '1']);
		
        return redirect('/admin/request');
    }
	public function edit(Request $request)
    {
		
    }
	public function detailset($id)
    {	
	
 
    }
	
	
	public function reject(Request $request)
	{
     $request_id = $request->input('request_id');
     $comment = $request->input('comment');
	 $tropid = $request->input('tropid');
	 
	 request1::where('request_id', $request_id)
          ->update(['request_status' => '2','request_comment' => $comment]);
	  trop::where('tid', $tropid)
          ->update(['trop_status' => '2']);
		
	 
       return redirect('/admin/request');
    }
	public function cat()
    {	
			    
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function Del($id){
           request1::where('request_id',$id)->delete(); 
      	return redirect('/admin/request');
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
