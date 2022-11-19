@livewire('partials.navbar')

<h1>{{ Request::route()->getName() }}</h1>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login to perform administrator actions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="login">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">

                            @if (Session::has('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif

                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="email" wire:model="email" value="{{ old('email') }}">

                                @error('email')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="password" wire:model="password">

                                @error('password')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                    </div>

                    <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
