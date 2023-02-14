<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all($token)
    {
        if ($token == 1) {
            $tasks = Task::all()->sortBy('created_at');
            return response()->json([
                'tasks' => $tasks
            ]);
        } else {
            return response()->json([
                'no_auth' => 'wrong'
            ]);
        }
    }
    public function oneUser($token, $id)
    {
        if ($token == 1) {
                $tasks = Task::all()->where('user_id', $id)->sortBy('created_at');
                return response()->json([
                    'tasks' => $tasks
                ]);
            } else {
                return response()->json([
                    'no_auth' => 'wrong'
                ]);
            }  
    }

    public function getNameAndEmailUser($token, $id)
    {
        if ($token == 1) {
            $user = User::find($id);
            $NameAndEmail = $user->name_email;
                return response()->json([
                    'NameAndEmail' => $NameAndEmail
                ]);
            } else {
                return response()->json([
                    'no_auth' => 'wrong'
                ]);
            }
    }
    public function getNameUpUser($token, $id)
    {
        if ($token == 1) {
            $user = User::find($id);
            $NameUp = $user->name_up;
                return response()->json([
                    'NameUp' => $NameUp
                ]);
            } else {
                return response()->json([
                    'no_auth' => 'wrong'
                ]);
            }
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
