@extends('admin.main')
@section('title','User Tambah')
@section('content')
<h1>User <small class="text-muted">Tambah</small></h1>
<hr>

<div class="row">
	<div class="col-md-6">
		<form method="POST" action="{{ route('admin.user.add') }}">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-header">
					<h5>Buat User Baru</h5>
				</div><!-- End Card Header -->

				<div class="card-body">
					
					<div class="form-group form-label-group">
						<input type="text" name="name"
						class="form-control"
						value="{{ old('name')}}"
						id="iName" placeholder="Name" required>
						<label for="iName">Name</label>
					</div><!-- End Form Group -->

					<div class="form-group form-label-group">
						<input type="email" name="email"
						class="form-control"
						value="{{ old('email')}}"
						id="iEmail" placeholder="Email" required>
						<label for="iEmail">Email</label>
					</div><!-- End Form Group -->

					<div class="form-group form-label-group">
						<input type="password" name="password"
						class="form-control"
						value="{{ old('password')}}"
						id="iPassword" placeholder="Password" required>
						<label for="iPassword">Password</label>
					</div><!-- End Form Group -->

					<div class="form-group form-label-group">
						<input type="password" name="repassword"
						class="form-control"
						value="{{ old('repassword')}}"
						id="iRePassword" placeholder="Re Password" required>
						<label for="iRePassword">Re Password</label>
					</div><!-- End Form Group -->

					<div class="form-group form-label-group">
						<select class="form-control"
						name="akses">
							<option value="">Pilih Akses Sebagai :</option>
							<option value="operator">Operator</option>
							<option value="admin">Administrator</option>
						</select>
					</div><!-- End Form Group -->

				</div><!--End Card Body-->

				<div class="card-footer">
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div><!-- End Card Footer-->

			</div><!-- End Card -->
		</form>
	</div>		
</div>

@endsection