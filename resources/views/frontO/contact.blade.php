@extends('layout.menu')
@section('content')

<section class="mbr-section content6 cid-r8KGaEsPaw" id="content6-s">
</section>
<section class="mbr-section content6 cid-r8KGaEsPaw" id="content6-s">

    <div class="container">
        <div class="row ">
        	<div class="col-sm-12 text-center">

               <h2>Contactez-nous</h2>
               <hr style="width: 250px; border-top: 3px solid #999;">
        	</div>
        </div>

 </div>


	    <div class="row justify-content-center">
	    	<div class="col-sm-8 ">
	    		<form>
	    			<div class="form-group">
	    				<label for="name"><b>Nom</b></label>
	    				<input type="text" name="name" class="form-control" placeholder="Entrez nom">

	    				
	    			</div>
	    			<div class="form-group">
	    				<label for="name"><b>Email</b></label>
	    				<input type="email" name="name" class="form-control" placeholder="@gmail.com">

	    				
	    			</div>
	    			<div class="form-group">
	    				<label for="tel"><b>N° Tel</b></label>
	    				<input type="tel" name="telp" class="form-control" placeholder="+213">

	    				
	    			</div>
	    			<div class="form-group">
	    				<label for="tel"><b>Message</b></label>
	    				<textarea class="form-control" rows="10" ></textarea>
	    			</div>
	    			<button type="submit" class="btn btn-primary">Envoyez</button>

	    		</form>
	    		
	    	</div>
</section>
@endsection