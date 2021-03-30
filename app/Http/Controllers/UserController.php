<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use Validator;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(UserLoginRequest $request)
    {
        try{
            $data = User::login($request->all());

            if(empty($data))
            {
                return response(['message' => 'Unauthorised'], 401);
            }

            return response(['message' => 'Usuário logado com sucesso!', 'data' => $data], 200);
        }
        catch(QueryException $e)
        {
            return response(['message' => 'Ocorreu algum erro. Contate o suporte.'], 500);
        }
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $data = User::orderby('name')->get();
            return response(['message' => 'Lista retornada com sucesso', 'data' => $data], 200);
        }catch(QueryException $e)
        {
            return response(['message' => 'Um erro ocorreu. Contate o suporte.'], 500);
        }
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        try
        {
            $data = User::store($request->all());
            return response(['message' => 'Usuário cadastrado com sucesso!', 'data' => $data], 200);
        }
        catch(QueryException $e)
        {
            return response(['message' => 'Um erro ocorreu. Contate o suporte.'], 500);
        }
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
        //
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
