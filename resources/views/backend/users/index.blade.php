@extends('layouts.backend')

@section('title', 'Page Title')



@section('content')
@include('partials._success',['flashSuccess'=>'status'])
<h2>Users
	&nbsp;
	<a class="ui right floated tiny primary labeled icon button" href="{{url('dashboard/users/create')}}">
	   	<i class="user add icon"></i> Add User
	</a>
</h2>

<div class="ui left icon input table-list-search-input">
	<input type="text" placeholder="Search users..." id="user-list-search">
	 <i class="users icon"></i>
</div>

<div id="user-table-list">
<div class="list-pagination top-list-pagination"></div>
	<table  class="ui celled table" cellspacing="0" width="100%">
	 	<thead>
	        <tr class="text-center">
	            <th>Id</th>
	            <th>Avatar</th>
	            <th>Role</th>
	            <th>Email</th>
	            <th>Display Name</th>
	            <th>Created at</th>
	            <th>Actions</th>
	        </tr>
	    </thead>
	    <tbody class="list text-center">
	    @if(count($users))
	    	@foreach($users as $user)
		    	<tr>
		    		<td class="user-table-id">{{$user->id}}</td>
		    		<td class="user-table-avatar">
					<a href="{{url('dashboard/users/'.$user->id)}}"><img class="ui image avatar" src="{{(!empty($user->avatar))? url($user->avatar) : url("images/avatar_default.png")}}"></a>
		    		</td>
		    		<td class="user-table-role">{{$user->getRoleDisplayName()}}</td>
		    		<td class="user-table-email">{{$user->email}}</td>
		    		<td class="user-table-display-name">{{$user->display_name}}</td>
		    		<td class="user-table-created-at">{{$user->created_at->format('d M Y')}}</td>
		    		<td>
		    			<a href="{{url('dashboard/users/'.$user->id)}}" class="mini ui button orange"><i class="edit icon"></i> Edit</a>
		    			@if(Auth::user()->id !== $user->id)
		    				<a href="{{url('dashboard/login-as/'.$user->id)}}" class="mini ui  button "><i class="icon spy"></i> Login</a>
		    			@endif
		    		</td>
		    	</tr>

		    @endforeach

		@endif
			    <tr id="user-table-no-results" style="display:none;"><td colspan="7">No results</td></tr>
	    </tbody>

	</table>
<div class="list-pagination bottom-list-pagination"></div>
</div>

@endsection
