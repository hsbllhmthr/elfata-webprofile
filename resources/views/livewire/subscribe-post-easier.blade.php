<div>

@if ($style == 'style1')

        <div class="newsletter-form wow fadeInUp">
            <form wire:submit="save">
                <input type="email" wire:model="email" placeholder="{{ __('frontend.enter_your_email') }}">
                <button type="submit" class="submit-btn">{{ __('frontend.subscribe_now') }}</button>
            </form>
            <div class="mt-2">
                @error('email') <span class="error">{{ $message }}</span> @enderror
                @if($message = Session::get('success'))
                    <span class="error">{{ __($message) }}</span>
                @endif
            </div>

        </div>

    @elseif ($style == 'style2')

        <form wire:submit="save">
            <input type="email" wire:model="email" placeholder="{{ __('frontend.enter_your_email') }}">
            <button type="submit" class="submit-btn">{{ __('frontend.subscribe_now') }}</button>
        </form>
        <div class="mt-2">
            @error('email') <span class="error">{{ $message }}</span> @enderror
            @if($message = Session::get('success'))
                <span class="error">{{ __($message) }}</span>
            @endif
        </div>

    @endif

</div>
