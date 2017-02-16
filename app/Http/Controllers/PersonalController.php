<?php

namespace App\Http\Controllers;
use App\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PersonalController extends Controller
{
    
     
    public function login( Request $request )
    {
        

        if( !$request->has('username') OR !$request->has('password') )
            return response()->json( "Data Is Missing", 400 );
        
        
        $personal = Personal::where( 'username', $request->username )
                    ->where( 'password', $request->password )
                    ->first();
        
        
        if( $personal === null )
            return response()->json( "User Not Found ", 404 );
        
        
       //Set Token
       $obj = new UserController();
       $token = $obj->setToken( $personal );
       
       // Get Permissions
       $result = $this->getPermissions( $personal->id );

       return response()->json( [ 'token' => $token, 'permissions' => $result ], 200 );
    }
    
    
    
    

    
    
    public function getPermissions( $user_id )
    {

        $permissions = DB::table('personal')
                    ->leftJoin('groups', 'personal.group_id', '=', 'groups.id')
                    ->leftJoin('group_permissions', 'group_permissions.group_id', '=', 'groups.id')
                    ->where( 'personal.id', $user_id )
                    ->get(['groups.title as groupName', 'group_permissions.table_name as tableName', 'group_permissions.permission']);
        
        

        if( $permissions->count() == 0 )
            return response()->json("failed to get permissions !", 400);


        $output = [];

        foreach ( $permissions as $row )
            $output[$row->tableName][] = $row->permission;


        return $output;
    }
    
    
    
    
}
