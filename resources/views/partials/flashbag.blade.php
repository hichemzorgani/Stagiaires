@if (session()->has('success'))
<x-alert type='success'>
    <small>{{session('success')}}</small>    
</x-alert>
@endif 
@if (session()->has('danger'))
<x-alert type='danger'>
    <small>{{session('danger')}}</small>    
</x-alert>
@endif 