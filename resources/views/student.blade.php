@extends('layouts.app')
@section('content')
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div> <!-- end .flash-message -->
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Manage Students</h2>
				</div>
				<div class="panel-body" style="overflow-x:auto;">
                    <div class="row">
                        <div class="col-lg-12" style="overflow-x:auto;">
                            <legend>Your Students</legend>						
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th></th>									
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($users)>0)
                                    {{$count = 0}}
                                    @foreach($users->all() as $user)
                                    <tr>
                                        <td>{{++$count}}</td>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a href="/manstudents/{{$user->email}}">
                                                <button class="btn btn-default">
                                                    Manage
                                                </button>                                                
                                            </a>
                                        </td>							
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>                            
                        </div>
                    </div>
			    </div>
		    </div>		
        </div>
    </div>    
</div>
@endsection