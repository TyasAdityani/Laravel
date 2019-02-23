@extends('admin.main')
@section('title','Kategori Tambah')
@section('content')
<h1>Kategori <small class="text-muted">Tambah</small></h1>
<hr>

<div class="row">
	<div class="col-md-6 mb-3">
		<form method="POST" action="{{ route('admin.kategori.add') }}">
			{{ csrf_field() }}
			<div class="card">
				
				<div class="card-header">
					<h5>Buat Kategori Baru</h5>
				</div><!-- End card Header -->

				<div class="card-body">
					<div class="form-group form-label-group">
						<input type="text" name="kategori"
						class="form-control {{ $errors->has('kategori')? 'is-invalid' : ''}}"
						value="{{ old('kategori') }}"
						id="iKategori" placeholder="Kategori" required>
						<label for="iKategori">Kategori</label>
						@if( $errors->has('kategori'))
						<div class="invalid-feedback">{{ $errors->first('kategori') }}</div>
						@endif
					</div><!-- End Form Group -->
				</div><!-- End Card Body -->

				<div class="card-footer">
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div><!-- End Card Footer -->

			</div><!-- End Card -->
		</form>
	</div>
</div>

@endsection