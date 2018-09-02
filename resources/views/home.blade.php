@extends('layouts.app')

@section('content')
@include('inc.messages')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Todos</div>

                <div class="">
                    <table class="table">
                        <tr>
                            <td class="text-center">Priority</td>
                            <td class="text-center">Description</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            {!!Form::open(['action' => 'ListItemsController@store', 'method' => 'POST', 'class' => 'form-group'])!!}
                            <td>{!!Form::number('priority','', ['class' => 'form-control'])!!}</td>
                            <td>{!!Form::text('item_desc','', ['class' => 'form-control'])!!}</td>
                            <td></td>
                            <td>{!!Form::submit('Add', ['class' => 'btn btn-success'])!!}</td>
                            {!!Form::close()!!}
                        </tr>
                        @foreach($items as $item)
                                <tr>
                                    {!!Form::open(['action' => ['ListItemsController@update', $item->id], 'method' => 'POST', 'class' => 'form-group', 'id' => $item->id])!!}
                                    {{Form::hidden('_method', 'PUT')}}
                                    <td class="text-center">{!!Form::number('priority',$item->priority, ['class' => 'form-control'])!!}</td>
                                    <td class="text-center">{!!Form::text('item_desc',$item->item_desc, ['class' => 'form-control'])!!}</td>
                                    <td class="text-center">{{Form::submit('Update', ['class' => 'btn btn-info'])}}</td>
                                    <td class="text-center">{{Form::submit('Remove', ['class' => 'btn btn-danger'])}}</td>
                                    {!!Form::close()!!}
                                </tr>
                            @endforeach
                        </table>  
                    </table>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
