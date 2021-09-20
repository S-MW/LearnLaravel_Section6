<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException; // This use for the Exception from API



class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8000/api/ApiTest'); 
        $lists = json_decode($response->getBody()->getContents());
        $lists = collect($lists);
        $lists = $lists->sortByDesc('updated_at');
        return view('index',compact('lists'));
        }
        catch (GuzzleException $e) {
            $lists = array();
            return view('index',compact('lists'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valadate = $request->validate([
            "name"=>"required",
            "age"=>"required",
            "country"=>"required",
        ]);
        

        try{
            $client = new Client();
            
            $response = $client->post( 'http://127.0.0.1:8000/api/ApiTest/?name='. $valadate['name'] . '&country='.$valadate['country'] . '&age='.$valadate['age']);
            $s = json_decode($response->getBody()->getContents());
            return redirect('/')->with('success', $s->info->name .': Adedd successfully');
        }
        catch (GuzzleException $e) {    
            return redirect()->back()->withErrors(['errors' => $response]);    
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
        // Allerdy is showen in index blade.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $client = new Client();
            $response = $client->get('http://127.0.0.1:8000/api/ApiTest/' . $id); 
            
            $lists = json_decode($response->getBody()->getContents());
            
            return view('edit',compact('lists'));
            }
            catch (GuzzleException $e) {

                return redirect()->back()->withErrors(['errors' => $response]);    
            }
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
        $valadate = $request->validate([
            "name"=>"required",
            "age"=>"required",
            "country"=>"required",
        ]);

        try{
            $client = new Client();
            
            $response = $client->put( 'http://127.0.0.1:8000/api/ApiTest/' . $id .'?name=' . $valadate['name'] . '&country='.$valadate['country'] . '&age='.$valadate['age']);
            $s = json_decode($response->getBody()->getContents());
            return redirect('/')->with('success', $s->data->name .': Updated successfully');
        }
        catch (GuzzleException $e) {    
            return redirect()->back()->withErrors(['errors' => $response]);    
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $client = new Client();
            $response = $client->delete( 'http://127.0.0.1:8000/api/ApiTest/' . $id);
            $s = json_decode($response->getBody()->getContents());
            return redirect('/')->with('success',': Deleted successfully');
        }
        catch (GuzzleException $e) {    
            return redirect()->back()->withErrors(['errors' => $response]);    
        } 
    }
}
