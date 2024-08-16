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
            <div class="flex justify-end my-5">
                <a
                    class="rounded-md bg-gray-700 hover:bg-gray-800 px-5 py-2.5 block text-md font-medium text-white shadow"
                    href="{{ route('contacts.index') }}"
                >
                    {{ __('All Contacts') }}
                </a>
            </div>
            <div class="bg-white">
                <form method="POST" action="{{ route('contacts.update', $contact) }}">
                    @csrf
                    @method('PUT')
                    <div class="p-5 rounded-md shadow p-4 mx-w-md">
                        <h2 class="text-3xl font-bold">{{ __('Contact Form') }}</h2>
                        <p class="text-gray-700">{{ __('A Simple Contact Management App') }}</p>
                        <div class="mt-8">
                            <div class="grid grid-cols-1 gap-6">
                                <label class="block">
                                    <span class="text-gray-700 font-medium">{{ __('Full name') }}</span>
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name', $contact->name) }}"
                                        class="@error('name') border-red-500 @enderror mt-1 block w-full p-2 rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        placeholder="{{ __('Mazharul Islam') }}"
                                    />
                                    @error('name')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 font-medium">{{ __('Email address') }}</span>
                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email', $contact->email) }}"
                                        class="@error('email') border-red-500 @enderror mt-1 block w-full p-2 rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        placeholder="{{ __('mazhar@example.com') }}"
                                    />
                                    @error('email')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 font-medium">{{ __('Phone number') }}</span>
                                    <input
                                        type="tel"
                                        name="phone"
                                        value="{{ old('phone', $contact->phone) }}"
                                        class="@error('phone') border-red-500 @enderror mt-1 block w-full p-2 rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        placeholder="{{ __('01865630585') }}"
                                    />
                                    @error('phone')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 font-medium">{{ __('Address') }}</span>
                                    <input
                                        type="text"
                                        name="address"
                                        value="{{ old('address', $contact->address) }}"
                                        class="@error('address') border-red-500 @enderror mt-1 block w-full p-2 rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        placeholder="{{ __('24/7 West Doctor Para, Feni Sadar, Feni') }}"
                                    />
                                    @error('address')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </label>
                                <div class="flex justify-end">
                                    <button type="submit" class="rounded-md cursor-pointer bg-indigo-600 px-7 py-2.5 text-md font-medium text-white shadow hover:bg-indigo-700">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

</body>
</html>
