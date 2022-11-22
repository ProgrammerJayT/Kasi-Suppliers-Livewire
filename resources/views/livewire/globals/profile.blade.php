@if ($privilege == 'vendor')
    @livewire('user.profile.vendor')
@endif

@if ($privilege == 'customer')
    @livewire('user.profile.customer')
@endif
