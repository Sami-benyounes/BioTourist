<?php

namespace App\Http\Controllers;

use App\Contact;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ContactController extends Controller
{

    private $sessionUser;

    public function __construct()
    {
        $this->middleware('SessionAuth')->only(
            'storeForAnAuthentifiedUser'
        );

        $this->middleware('admin')->only(
                    'index','destroy','ContactsWithAssociedUsers'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ContactsWithAssociedUsers(Client $client, Request $request)
    {
        $data['idUser'] = config('api.api_admin_id');
        $data['api_token'] = config('api.api_admin_token');

        $query = $client->request('POST','http://localhost:8001/api/contact/ContactsWithAssociedUsers',
            ['form_params' => $data]);

        $response = json_decode($query->getBody()->getContents());

        dd($response);

        return view('testComment',["response" => $response]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('testContact');
    }

    public function storeForAnAnonymous(Request $request, Client $client)
    {
        $data = request()->all();
        $data['idUser'] = config('api.api_admin_id');
        $data['api_token'] = config('api.api_admin_token');


        $query = $client->request('POST','http://localhost:8001/api/contact/store',
            ['form_params' => $data]);

        $response = json_decode($query->getBody()->getContents());

        if ($response->status == '400') {
            Session::flash('fail','There is an error please try later !');
            return redirect('/');
        }
            Session::flash('success','Your message has been sent !');

            return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeForAnAuthentifiedUser(Request $request, Client $client)
    {
        $this->sessionUser = $request->session()->get('user');

        $data = request()->all();
        $data['idUser']     = $this->sessionUser->idUser;
        $data['api_token']  = $this->sessionUser->api_token;

        $query = $client->request('POST','http://localhost:8001/api/contact/store',
            ['form_params' => $data]);

        $response = json_decode($query->getBody()->getContents());

        if ($response->status == '400') {
            Session::flash('fail','There is an error please try later !');
            return redirect('/');
        }
        Session::flash('success','Your message has been sent !');

        return redirect('/');
    }

    public function ContactsOfAUser(Request $request, Client $client){

        $data = request()->all();
        $data['idUser'] = config('api.api_admin_id');
        $data['api_token'] = config('api.api_admin_token');


        $query = $client->request('POST','http://localhost:8001/api/contact/ContactsOfAUser',
            ['form_params' => $data]);

        $response = json_decode($query->getBody()->getContents());

        dd($response);

        return route('profil',["fail" => "There is an error please try later !"])->with('session', $session);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Client $client, $idContact)
    {
        $this->sessionUser = $request->session()->get('user');

        $data = request()->all();
        $data['idUser']     = $this->sessionUser->idUser;
        $data['api_token']  = $this->sessionUser->api_token;
        $data['idContactDelete'] = $idContact;

        $query = $client->request('POST','http://localhost:8001/api/contact/destroy',
            ['form_params' => $data]);

        $response = json_decode($query->getBody()->getContents());


        if($response->status == '400'){

            return redirect()->route('admin',['errorContact' => 'the Contact id doesn\'t exist']);
        }

        return redirect()->route('admin',['successContact' => 'the Contact has been destroy successfully']);
    }
}
