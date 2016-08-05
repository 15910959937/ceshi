<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Input;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class Day2Controller extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
        $arr = DB::table('zhoukao')->orderby('id','asc')->paginate(5);
        //print_r($arr);die;
        return view('login',['arr' => $arr]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

    //删除
    public function del(){

        $id = input::get('id');
        $last_id=input::get('last_id');
        $last_id=trim($last_id,'tr_');
//        print_r($last_id);die;
        //echo $page;die;
        $arr = DB::table('zhoukao')->where('id',$id)->delete();
        if($arr){
            $arr = DB::select("select * from zhoukao where id>$last_id limit 1");
            echo json_encode($arr);
        }else{
            return 0;
        }
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
