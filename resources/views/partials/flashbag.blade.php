@if (session()->has('success'))
<x-alert type='success'>
    <small>{{session('success')}}</small>    
</x-alert>
@endif 