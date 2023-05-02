@extends('layouts.master')

@section('content')
<main>
    <div class="container-fluid ">
        <h1 class="mt-4">Create New Products</h1>
    
        {!! Form::open(['route' => 'products.store', 'method' => 'post', 'files' => true])!!}
        <div class="form-group mt-2">
                {!!Form::label('Product_name','Product_name',['class' => 'fw-bold'])!!}
                {!!Form::text('Product_name',null,['class' => 'form-control'])!!}
            </div>
                <div class="form-group mt-2"> 
                {!!Form::label('Product_image','Product_image',['class' => 'fw-bold'])!!}
                {!!Form::file('Product_image',['class' => 'form-control'])!!}
            </div>
                <div class="form-group mt-2">
                {!!Form::label('Product_price','Product price',['class' => 'fw-bold'])!!}
                {!!Form::text('Product_price',null,['class' => 'form-control'])!!}
            </div>
                <div class="form-group mt-2">
                {!!Form::label('GST','GST',['class' => 'fw-bold'])!!}
                {!!Form::text('GST',null,['class' => 'form-control'])!!}
            </div>
                <div class="form-group mt-2">
                {!!Form::label('Products_Discription','Products Discription',['class' => 'fw-bold'])!!}
                {!!Form::textarea('Products_Discription',null,['class' => 'form-control'])!!}
            </div>
               {!! Form::submit('submit' ,['class' => 'fw-bold'])!!}

        {!! Form::close() !!}
    </div>

</main>
@endsection