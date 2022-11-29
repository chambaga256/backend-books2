<?php

namespace App\Http\Controllers;
use App\Models\book;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Validator;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return book::all(); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',

        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $book = book::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Book Record Created Successfully',
            'book' =>$book
        ]

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return book::find($id);
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
        if(book::where('id',$id)->exists()){
            $book = book::find($id);
            $book->title = $request->title;
            $book->author = $request->author;
            $book->publisher = $request->publisher;
            $book->save();
            return response()->json([
                'message' => 'Book Record updated Successfully'

            ,200]);

        }
        else{
            return response()->json([
                'message' => 'Book Record Not Found'
            ],404);
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
        if(book::where('id',$id)->exists()){
        $book = book::find($id);
        $book->delet();
        return response()->json([
            'message' => "Book Record  deleted Successfully "

        ],200);
    }else
    {
        return response()->json([
            'message' =>"Book Record  Not Found"
        ],200);
        }
    }
}
