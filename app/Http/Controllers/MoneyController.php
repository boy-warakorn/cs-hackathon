<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Money;


class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $money = Money::all()->toArray();
        return view('money.index', compact('money'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('money.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['money' => 'required']);

            $money = new Money(
            [ 
                'money' => $request->get('money')
            ]
            );
            $money->save();
        return redirect()->route('money.index')->with('success','Save successfully');
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
        $money = Money::find($id);
        return view('money.edit', compact('money','id'));
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
        $this->validate($request,
        ['money' => 'required'

        ]
        );
        $money = Money::find($id);
        $money->money = $request->get('money');
        $money->save();
        return redirect()->route('money.index')->with('success', 'update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $money = Money::find($id);
        $money->delete();
        return redirect()->route('money.index')->with('success', 'finish delete');
        return 0;
    }
}
