{{-- Contact --}}
<div class="">
    @foreach ($contacts as $contact)
        <div class="mt-5 rounded bg-white text-card-foreground shadow-lg border" data-v0-t="card">
            <div class="flex flex-col space-y-1.5 p-6">
                <div class="">
                    <div class="mb-5 flex items-center gap-4">
                        <a href="{{ route('contacts.show', $contact) }}">
                            <h2 class="text-xl font-medium">
                                {{ $contact->id }}: {{ $contact->name }}
                            </h2>
                        </a>
                        <small class="text-sm text-gray-600">{{ $contact->created_at->format('j M Y, g:i a') }}</small>
                        @unless ($contact->created_at->eq($contact->updated_at))
                            <small class="text-sm text-gray-600">{{ __('(edited)') }}</small>
                        @endunless
                    </div>
                    <div class="space-y-1.5">
                        <p class="text-sm">
                            <span class="font-medium">{{ __('Email :') }}</span> {{ $contact->email }}
                        </p>
                        <p class="text-sm">
                            <span class="font-medium">{{ __('Phone Number :') }}</span> {{ $contact->phone }}
                        </p>
                        <p class="text-sm">
                            <span class="font-medium">{{ __('Address :') }}</span> {{ $contact->address }}
                        </p>
                    </div>
                </div>
                <div class="flex justify-end gap-4">
                    <a
                        class="rounded-md bg-gray-700 hover:bg-gray-900 px-5 py-2.5 block sm:text-md font-medium text-white shadow"
                        href="{{ route('contacts.edit', $contact) }}"
                    >
                        {{ __('Edit') }}
                    </a>
                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="rounded-md bg-red-500 hover:bg-red-700 px-5 py-2.5 block sm:text-md font-medium text-white shadow"
                            href="{{ route('contacts.destroy', $contact) }}"
                        >
                            {{ __('Delete') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
