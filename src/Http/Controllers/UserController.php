<?php

namespace avivieu\bitrixRedmine\Http\Controllers;

use DB;
use avivieu\bitrixRedmine\Models\User_model;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // print config('redmine.url');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new \Redmine\Client(config('redmine.url'), config('redmine.login'),config('redmine.password'));
        $res=$client->api('user')->create(array(
            'login' => $_POST['EMAIL'],
            'firstname' => $_POST['NAME'],
            'lastname' => $_POST['LAST_NAME'],
            'mail' => $_POST['EMAIL'],
            'password' => $_POST['CONFIRM_PASSWORD']
        ));

        $user = new User_model;
        $user -> bitrix_id = $_POST['ID'];
        $user -> redmine_id = $res->id;
        $user -> save();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $user = DB::table('users')->where('bitrix_id', $id)->first();
        $client = new \Redmine\Client(config('redmine.url'), config('redmine.login'),config('redmine.password'));
        $client->api('user')->update($user->redmine_id, array(
            'login' => $_POST['EMAIL'],
            'firstname' => $_POST['NAME'],
            'lastname' => $_POST['LAST_NAME'],
            'mail' => $_POST['EMAIL'],
            'password' => isset($_POST['CONFIRM_PASSWORD']) ? $_POST['CONFIRM_PASSWORD']:""
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new \Redmine\Client(config('redmine.url'), config('redmine.login'),config('redmine.password'));
        $user = DB::table('users')->where('bitrix_id', $id)->first();
        $client->api('user')->remove($user->redmine_id);
    }
}
