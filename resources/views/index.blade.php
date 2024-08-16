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
            <div class="flex justify-between items-center gap-4 my-5">
                <div>
                    <form action="{{ route('contacts.index') }}" method="GET">
                        <div class="flex gap-2">
                            <input
                                type="search"
                                name="search"
                                placeholder="Search by name or email"
                                class="p-2 rounded-md border border-indigo-300 outline-none shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                            <button
                                type="submit"
                                class="rounded-md bg-indigo-600 hover:bg-indigo-700 px-5 py-2.5 block sm:text-md font-medium text-white shadow"
                            >{{ __('Search') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="flex justify-end align-center gap-4">
                    <a
                        class="rounded-md bg-indigo-600 hover:bg-indigo-700 px-5 py-2.5 block sm:text-md font-medium text-white shadow"
                        href="{{ route('contacts.create') }}"
                    >
                        {{ __('Add New Contact') }}
                    </a>
                    <form>
                        <select
                            id="sortContact"
                            name="sort" onchange="this.form.submit()"
                            class="rounded-md border border-indigo-300 px-2 py-2.5 text-gray-700 sm:text-md cursor-pointer font-medium">
                            <option value="">{{ __('All Contacts') }}</option>
                            <option
                                value="name" {{ request()->input('sort') == 'name' ? 'selected' : '' }}>{{ __('Sort by Name') }}</option>
                            <option
                                value="created_at" {{ request()->input('sort') == 'created_at' ? 'selected' : '' }}>{{ __('Sort by Date') }}</option>
                        </select>
                    </form>
                </div>

            </div>
            <div class="bg-gray-700 rounded rounded-b-none text-3xl font-bold text-white p-5">
                {{ __('Contacts') }}
            </div>
            <div class="bg-white py-5 border border-t-none sm:px-5 rounded rounded-t-none">
                <table class="table-auto w-full mb-4 shadow-xl hover:shadow-lg rounded-lg">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-4 text-gray-600 font-bold uppercase text-left">{{ __('Name') }}</th>
                        <th class="px-4 py-4 text-gray-600 font-bold uppercase text-left">{{ __('Email') }}</th>
                        <th class="px-4 py-4 text-gray-600 font-bold uppercase text-left">{{ __('Phone') }}</th>
                        <th class="px-4 py-4 text-gray-600 font-bold uppercase text-left">{{ __('Address') }}</th>
                        <th class="px-4 py-4 text-gray-600 font-bold uppercase text-left">{{ __('Created at') }}</th>
                        <th class="px-4 py-4 text-gray-600 font-bold uppercase text-left">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-4">{{ $contact->name }}</td>
                            <td class="px-4 py-4">{{ $contact->email }}</td>
                            <td class="px-4 py-4">{{ $contact->phone }}</td>
                            <td class="px-4 py-4">{{ $contact->address }}</td>
                            <td class="px-4 py-4">{{ $contact->created_at->format('j M Y, g:i a') }}</td>
                            <td class="px-4 py-4">
                                <div class="flex gap-2 justify-end items-center">
                                    <a href="{{ route('contacts.show', $contact->id) }}"
                                       class="bg-green-200 py-2 px-4 rounded text-gray-900 hover:bg-green-300 hover:text-gray-900">View</a>
                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                       class="bg-yellow-200 py-2 px-6 rounded text-gray-900 hover:bg-yellow-300 hover:text-gray-900">Edit</a>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Delete') }}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</body>
</html>

