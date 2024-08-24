@extends('templates.base')

@section('konten')
@include('templates.navbar')

<div class="jumbotron">
	<div class="container mx-auto">
		<h1 class="text-white text-4xl font-semibold">{{__('public.hello')}}, {{ $user->name }}!</h1>
	</div>
</div>

<div class="px-4 py-12">
	<div class="container mx-auto">

		@if ($user->personal_identification_number == '')
			<p>{{__('public.pin_not_set')}}</p>

		@else
			<a href="{{ route('admin.tambah') }}" class="button button-blue">{{__('public.addNewPassword')}}</a>

			@if (session()->has('success'))
			<div class="alert alert-green my-4">
				{{ session('success') }}
			</div>
			@endif

			<div class="my-4">
				{{$passwords->links()}}
			</div>

			<table class="max-w-full w-full overflow-auto my-4">
				<thead>
					<tr>
						<th class="px-3 py-2 bg-gray-50 uppercase">{{__('public.accountName')}}</th>
						<th class="px-3 py-2 bg-gray-50 uppercase">{{__('public.description')}}</th>
						<th class="px-3 py-2 bg-gray-50 uppercase">Username</th>
						<th class="px-3 py-2 bg-gray-50 uppercase">Password</th>
						<th class="px-3 py-2 bg-gray-50 uppercase" colspan="2">{{__('public.options')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($passwords as $password)
					<tr>
						<td class="px-3 py-2">{{$password->nama_password}}</td>
						<td class="px-3 py-2">{{$password->deskripsi_password}}</td>
						<td class="px-3 py-2">{{$password->username}}</td>
						<td class="px-3 py-2"><button class="button button-blue" id="password-{{$password->id}}" data-password="{{$password->password}}" onclick="copyPassword('password-{{$password->id}}')">{{__('public.copyToClipboard')}}</button></td>
						<td class="px-3 py-2">
							<div class="grid grid-cols-2 gap-2 w-full">
								<a href="{{route('admin.edit', ['id' => $password->id])}}" class="button button-green"><i class="fa fa-pencil"></i> Edit</a>
								<form action="{{route('admin.hapus.post', ['id' => $password->id])}}" class="grid w-full" method="post">
									@csrf
									<button type="submit" class="button button-red"><i class="fa fa-trash"></i> {{__('public.delete')}}</button>
								</form>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>
</div>
@endsection

@section('javascript')
<script>
	async function copyPassword(password) {
		const el = document.getElementById(password);
		const data_password = el.getAttribute('data-password');

		try {
			await navigator.clipboard.writeText(data_password)
			console.log('Berhasil copy password');
			el.innerText = "{{__('public.copied')}}"
			el.classList.remove('button-blue')
			el.classList.add("button-green")
			setInterval(() => {
				el.innerText = "{{__('public.copyToClipboard')}}"
				el.classList.remove('button-green')
				el.classList.add("button-blue")
			}, 2000);
		} catch (error) {
			console.error("Copy error: ", error);
		}
	}
</script>
@endsection