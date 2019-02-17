@extends('admin.main')
@section('title','User')
@section('content')
<h1>User</h1>
<hr>

@if(session('result') == 'success')
<div class="alert alert-success alert-dismissible fade show">
	<strong>Saved!</strong> Berhasil disimpan.
	<button type="button" class="close" data-dismiss="alert">
		&times;
	</button>
</div>
@endif

@if(session('result') == 'update')
<div class="alert alert-success alert-dismissible fade show">
	<strong>Update!</strong> Berhasil diupdate.
	<button type="button" class="close" data-dismiss="alert">
		&times;
	</button>
</div>
@endif

<div class="row">
	<div class="col-md-6 mb-3">
		<a href="{{ route('admin.user.add') }}" class="btn btn-primary">[+] Tambah</a>
	</div>

	<div class="col-md-6 mb-3">
		<form method="GET" action="{{route('admin.user')}}">
			<div class="input-group">
				<input type="text" name="keyword"
				value="{{request('keyword')}}"
				class="form-control">
				<div class="input-group-append">
					<button type="submit"
					class="btn btn-primary">
						Cari !
					</button>
				</div>
			</div>			
		</form>
	</div>
</div>

<table class="table table-striped mb-3">
	<tr>
		<th>Name</th><th>Email</th><th>Akses</th><th>&nbsp;</th>
	</tr>
	@foreach($data as $dt)
	<tr>
		<td>{{ $dt->name }}</td>
		<td>{{ $dt->email }}</td>
		<td>{{ $dt->akses }}</td>
		<td>
			<a href="{{ route('admin.user.edit',['id'=>$dt->id]) }}"
			 class="btn btn-success btn-sm">
				<i class="fa fa-w fa-edit"></i>
			</a>
			
			@if( $dt->id != Auth::id() )
			<button class="btn btn-danger btn-sm btn-trash" 
			data-id= "{{ $dt->id }}"
			type="button">
				<i class="fa fa-w fa-trash"></i>
			</button>
			@endif

		</td>
	</tr>
	@endforeach
</table>

{{
	$data->appends( request()->only('keyword') )
	->links('vendor.pagination.bootstrap-4')
}}

@endsection

@push('modal')
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-header">
				<h5 class="modal-title">Delete</h5>
				<button class="close" type="button" data-dismiss="modal">
					<span>x</span>
				</button>
			</div><!-- End Modal Header-->

			<div class="modal-body">
				Apakah Anda yakin ingin menghapusnya?
				<form id="form-delete" method="post" action="#">
				{{ csrf_field() }}
				{{ method_field('delete') }}
				<input type="hidden" name="id" id="input-id">					
				</form>
			</div><!--End Modal Body -->

			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button class="btn btn-primary btn-delete" type="button" >Delete</button>
			</div>

		</div><!-- End Modal Content-->
	</div><!-- End Modal Dialog -->
</div>

@endpush

@push('js')
<script type="text/javascript">
	$(function(){
		$('.btn-trash').click(function(){
			id = $(this).attr('data-id');
			$('#input-id').val(id);
			$('#deleteModal').modal('show');
		});
		$('.btn-delete').click(function(){
			alert($('#input-id').val());
		});
	});
</script>

@endpush
