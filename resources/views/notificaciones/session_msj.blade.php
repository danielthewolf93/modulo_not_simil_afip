{{--Para lanzar las notificaciones utilizando toastr --}}
@if (session()->has('message'))
	<script >toastr.success(" {{ session('success')}} ")</script>

@elseif (session()->has('error'))
	<script >toastr.error(" {{ session('error')}} ")</script>
@elseif (session()->has('info'))
	<script >toastr.info(" {{ session('info')}} ")</script>
@elseif (session()->has('warning'))
	<script >toastr.options.progressBar = true; toastr.warning(" {{ session('warning')}} ","{{ Auth::user()->name }}")</script>
@endif	