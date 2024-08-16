<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sort = $request->input('sort');

        if ($sort == 'name') {
            $contacts = Contact::orderBy('name', 'asc')->get();
        } elseif ($sort == 'created_at') {
            $contacts = Contact::orderBy('created_at', 'desc')->get();
        } else {
            $contacts = Contact::all();
        }

        $search = $request->input('search');
        if ($search) {
            $contacts = Contact::where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->get();
        }

        return view('index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts',
            'phone' => 'nullable',
            'address' => 'nullable|string|max:255',
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $contact = Contact::find($id);
        return view('show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact): View
    {
        return view('edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable',
            'address' => 'nullable|string|max:255',
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
