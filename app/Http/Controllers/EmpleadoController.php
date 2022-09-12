<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use GuzzleHttp\Client as HttpClient;

class EmpleadoController extends Controller
{

    public function __construct()
    {
        //$this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('id', 'DESC')->get();

        //dd($empleados);

        return view('Empleado.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencyWS = $this->obtenerCurrencyWS();
        $listMonedas = explode(";" , $currencyWS);
        return view('Empleado.create',compact('listMonedas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'email' => 'required | email',//Formato Correo
            'nacimiento' => 'nullable | date | before:today',//Solo acepte formato fecha
            'direccion' => 'nullable',
            'genero' =>  [
                'required',
                Rule::In(['masculino', 'femenino']),
            ],//Solo acepte masculino/femenino
            'telefono' => 'required | size:10',
            'codigo_empleado' => 'required | unique:empleado,codigo_empleado',//unico//
            'salario' => 'required',
            'tipo_moneda' => 'required'
        ]);

        /*$validaciones = Validator::make($request->all().[
                'nombre' => 'required',
                'paterno' => 'required',
                'materno' => 'required',
                'email' => 'required | email',//Formato Correo
                'nacimiento' => 'date | before:today',//Solo acepte formato fecha
                'direccion' => '',
                'genero' => 'required',//Solo acepte masculino/femenino
                'telefono' => 'required | size:10',
                'codigo_empleado' => 'required | unique'//unico
            ])->validaciones();*/

        $arraySave =[
            'nombre' => $request->get("nombre"),
            'paterno' => $request->get('paterno'),
            'materno' => $request->get('materno'),
            'email' => $request->get('email'),
            'nacimiento' => $request->get('nacimiento'),
            'direccion' => $request->get('direccion'),
            'genero' => $request->get('genero'),
            'telefono' => $request->get('telefono'),
            'codigo_empleado' => $request->get('codigo_empleado'),
            'salario' => $request->get('salario'),
            'tipo_moneda' => $request->get('tipo_moneda'),
        ];
            //dd($arraySave);

        Empleado::create($arraySave);

        return redirect()->route('empleado.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        return view('Empleado.show',compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $currencyWS = $this->obtenerCurrencyWS();
        $listMonedas = explode(";" , $currencyWS);
        return view('Empleado.edit',compact('empleado','listMonedas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'email' => 'required | email',//Formato Correo
            'nacimiento' => 'nullable | date | before:today',//Solo acepte formato fecha
            'direccion' => 'nullable',
            'genero' =>  [
                'required',
                Rule::In(['masculino', 'femenino']),
            ],//Solo acepte masculino/femenino
            'telefono' => 'required | size:10',
        ]);


        Empleado::find($id)->update($request->all());

        return redirect()->route('empleado.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Empleado::find($id)->delete();
        return redirect()->route('empleado.index')->with('success','Registro eliminado satisfactoriamente');
    }

    private function obtenerCurrencyWS(){

        $client = new HttpClient(['base_uri' => 'https://fx.currencysystem.com/webservices/CurrencyServer5.asmx/','verify' => false]);
        $response = $client->request('GET',"AllCurrencies",['query' => 'licenseKey=']);
        return xmlrpc_decode($response->getBody()->getContents());
    }
}
