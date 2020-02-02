@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
       
        <div class="alert alert-danger animated bounce">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ $error }}
        </div>
    @endforeach
@endif

@if (session('success'))

<div class="alert alert-success animated bounce">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('success') }}</strong> 
</div>

@endif

@if (session('error'))
<div class='alert alert-danger animated bounce'>
    {{ session('error') }}
</div>

@endif

<style type="text/css">
    .alert .animated{
        animation-duration: 8.4s;
    }
</style>
<script>
$(".alert").fadeOut(8000 );
</script>