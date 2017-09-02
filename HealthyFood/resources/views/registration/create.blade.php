@extends('layouts.master')

@section('content')
	 <div class="col-sm-8 blog-main">
	 	<h1>Sign-Up</h1>
	 	   <form method="POST" action="/register">
          {{ csrf_field()}}
			  <div class="form-group">
   				 <label for="name">Name:</label>
  				  <input type="text" class="form-control" id="name" name="name">
			  </div>

			  <div class="form-group">
   				 <label for="email">E-Mail:</label>
  				  <input type="email" class="form-control" id="email" name="email">
			  </div>

			  <div class="form-group">
   				 <label for="password">Password:</label>
  				  <input type="password" class="form-control" id="password" name="password">
			  </div>
               
               <div class="form-group">
   				 <label for="password_confirmation">Re-Type Password:</label>
  				  <input type="password" class="form-control" id="password_confirmation"
  				   name="password_confirmation">
			  </div>
      <div class="form-group">
         Gender : 
         <select class="form-group" name="gender">
           <option value="male">Male</option>
           <option value="female">Female</option>
         </select>
          </div>
         <div class="form-group">
         Statue : 
         <select class="form-group" name="statue">
           <option value="user">User</option>
           <option value="specialist">Specialist</option>
         </select>
        </div>
         <div class="form-group">   
 			 <button type="submit" class="btn btn-primary">Sign Up</button>
       </div>
       		@include('layouts.errors')
		 </form>

	 </div>



@endsection