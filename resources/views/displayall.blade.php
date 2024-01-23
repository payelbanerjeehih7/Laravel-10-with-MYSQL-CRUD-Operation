<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Display All</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	@if(isset($allinfo))
	@if(session('message'))
		<div class="alert alert-danger">{{session('message')}}</div>
	@endif
	<Form action="" class="col-9">
		<div class="form-group">
			<input type="search" name="search" id="" placeholder="Search by Name or Email" class="col-7" value="">
			<input type="submit" name="submit" id="" value="Search" class="btn btn-success">
			<a href="{{url('/displayall')}}">
				<button class="btn btn-danger">Reset</button>
			</a>
		</div>
	</Form>
	<div class="table-responsiv">
		<table border="1" cellpadding="20" cellspacing="0" class="table table-hover table-border">
			<h2>Welcome Admin</h2>
			<tr>
				<th>SL.No.</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Phone</th>
				<th>Gender</th>
				<th>Language</th>
				<th>Profile Picture</th>
				<th>Action</th>
			</tr>
			@php 
			$i=1;
			@endphp
			@foreach($allinfo->all() as $all)
			<tr>
				<td>@php echo $i; $i++; @endphp</td>
				<td>{{$all->name}}</td>
				<td>{{$all->email}}</td>
				<td>{{$all->password}}</td>
				<td>{{$all->phone}}</td>
				<td>{{$all->gender}}</td>
				<td>{{$all->language}}</td>
				<td><img src="{{$all->image}}" height="100"></td>
				<td><a href="{{url('/block')}}{{$all->id}}">Block</a> || 
					<a href="{{url('/unblock')}}{{$all->id}}">Unblock</a> || 
					<a href="{{url('/delete')}}{{$all->id}}">Delete</a></td>
			</tr>
			@endforeach
		</table>
	</div>
	@endif
	<div class="row">
	{{$allinfo->links("pagination::bootstrap-4")}}
	</div>
</body>
</html>