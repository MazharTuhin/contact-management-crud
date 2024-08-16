<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Management Application</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full box-border">
<div class="min-h-screen bg-gray-50">
    <header class="shadow-lg bg-indigo-500">
        <div class="py-5 container mx-auto text-white">
            <h1 class="text-3xl text-center font-bold uppercase">Contact Management Application</h1>
        </div>
    </header>
    <main class="bg-gray-50">
        <div class="container mx-auto sm:px-20">
            <div class="flex justify-end items-center gap-4 my-5">
                <a
                    class="rounded-md bg-indigo-600 hover:bg-indigo-700 px-5 py-2.5 block sm:text-md font-medium text-white shadow"
                    href="{{ route('contacts.create') }}"
                >
                    {{ __('Add New Contact') }}
                </a>
                <a
                    class="rounded-md bg-gray-700 hover:bg-gray-800 px-5 py-2.5 block sm:text-md font-medium text-white shadow"
                    href="{{ route('contacts.index') }}"
                >
                    {{ __('All Contacts') }}
                </a>
            </div>
            <div class="mt-5 p-4 rounded bg-white text-card-foreground shadow-lg border" data-v0-t="card">
                <div class="border border-indigo-50 rounded">
                    <div class="flex flex-col space-y-2 p-4">
                        <div class="">
                            <div class="mb-5 bg-indigo-500 p-2 text-white rounded">
                                <a href="{{ route('contacts.show', $contact) }}">
                                    <h2 class="text-2xl text-center font-medium">
                                        {{ $contact->name }}
                                    </h2>
                                </a>
                            </div>
                            <div class="space-y-2">
                                <p class="text-sm">
                                    <span class="font-medium">{{ __('Email :') }}</span> {{ $contact->email }}
                                </p>
                                <p class="text-sm">
                                    <span class="font-medium">{{ __('Phone Number :') }}</span> {{ $contact->phone }}
                                </p>
                                <p class="text-sm">
                                    <span class="font-medium">{{ __('Address :') }}</span> {{ $contact->address }}
                                </p>
                                <p class="text-sm">
                                    <span class="font-medium">{{ __('Created at : ') }} </span> {{ $contact->created_at->format('j M Y, g:i a') }}
                                    @unless ($contact->created_at->eq($contact->updated_at))
                                        <small class="text-sm text-gray-600">{{ __('(edited)') }}</small>
                                    @endunless
                                </p>
                            </div>
                        </div>
                        <div class="flex justify-end gap-4">
                            <a
                                class="rounded-md bg-yellow-400 hover:bg-yellow-500 px-6 py-2.5 block sm:text-md font-medium text-gray-800 shadow"
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
            </div>
        </div>
    </main>
</div>

</body>
</html>

