<div>
    <form wire:submit="save" class="contact-form row">
        <div class="col-12">
            <input type="text" wire:model="name" placeholder="{{ __('frontend.name') }}" required>
        </div>
        <div class="col-12">
            <input type="email" wire:model="email" placeholder="{{ __('frontend.email_address') }}" required>
        </div>
        <div class="col-12">
            <input type="text" wire:model="phone" placeholder="{{ __('frontend.phone_number') }}" required>
        </div>
        <div class=col-12">
            <textarea wire:model="message" placeholder="{{ __('frontend.write_your_message') }}"></textarea>
        </div>
        <div class="col-12">
            <button type="submit"  class="theme-btn">{{ __('frontend.message_submit') }}</button>
        </div>
        <div class="mt-2">
            @error('name') <span class="error">{{ $message }}</span> @enderror
            @error('email') <span class="error">{{ $message }}</span> @enderror
            @error('phone') <span class="error">{{ $message }}</span> @enderror
            @error('message') <span class="error">{{ $message }}</span> @enderror
            @if($message = Session::get('success'))
                <span class="error">{{ __($message) }}</span>
            @endif
        </div>
    </form>
</div>
