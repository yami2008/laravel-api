<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index(){
        return ClientResource::collection(Client::with(['engins', 'demandesInterventionService'])->get());
        // return Client::all();
        // return Client::select('id_client')->get() ;
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'societe' => ['required', 'unique:clients', 'max:255'],
            'telephone' => ['required', 'max:30'],
            'email' => ['required', 'email', 'max:30'],
        ], [
            'societe.required' => "Ce champs est requis" ,
            'societe.unique' => "Ce champs doit être unique" ,
            'societe.max' => "La taille de ce champs ne doit pas dépasser 255 caractères" ,
            'telephone.required' => "Ce champs est requis" ,
            'telephone.max' => "La taille de ce champs ne doit pas dépasser 30 caractères" ,
            'email.required' => "Ce champs est requis" ,
            'email.email' => "Ce champs n'est pas valide" ,
            'email.max' => "La taille de ce champs ne doit pas dépasser 30 caractères" ,
        ]);
        if ($validator->fails())
            return response()->json($validator->errors() , 401) ;

        $client = new Client;
        $client->societe = $request->societe ;
        $client->telephone = $request->telephone ;
        $client->email = $request->email ;
        $client->save();

        return new ClientResource($client);

    }

    public function show($id){
        return new ClientResource(Client::findOrFail($id)) ;
    }

    public function update(Request $request){
        $client = Client::findOrFail($request->id_client) ;

        $validator = Validator::make($request->all(), [
            'societe' => ['required', Rule::unique('clients')->ignore($client), 'max:255'],
            'telephone' => ['required', 'max:30'],
            'email' => ['required', 'email', 'max:30'],
        ], [
            'societe.required' => "Ce champs est requis" ,
            'societe.unique' => "Ce champs doit être unique" ,
            'societe.max' => "La taille de ce champs ne doit pas dépasser 255 caractères" ,
            'telephone.required' => "Ce champs est requis" ,
            'telephone.max' => "La taille de ce champs ne doit pas dépasser 30 caractères" ,
            'email.required' => "Ce champs est requis" ,
            'email.email' => "Ce champs n'est pas valide" ,
            'email.max' => "La taille de ce champs ne doit pas dépasser 30 caractères" ,
        ]);
        if ($validator->fails())
            return response()->json($validator->errors() , 401) ;

        $client->societe = $request->societe ;
        $client->telephone = $request->telephone ;
        $client->email = $request->email ;
        $client->save() ;

        return new ClientResource($client);
    }

    public function search($token){
        $clients = Client::where('societe', 'LIKE', '%'.$token.'%')
            ->orWhere('telephone', 'LIKE', '%'.$token.'%')
            ->orWhere('email', 'LIKE', '%'.$token.'%')
            ->get();

        return count($clients) != 0 ? $clients : ['result' => "No results found"] ;
    }

    public function delete($id){
        $client = Client::find($id);
        $client->delete() ;
        return response(null , Response::HTTP_NO_CONTENT) ;
    }

}
