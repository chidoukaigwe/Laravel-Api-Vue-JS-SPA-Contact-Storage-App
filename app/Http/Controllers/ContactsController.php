<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Contact as ContactResource;

class ContactsController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Contact::class);
        return ContactResource::collection(request()->user()->contacts);
    }

    public function store()
    {
        $this->authorize('viewAny', Contact::class);

        //  Using The Request User to Create The Data
        //  Use the contact relationship on the user to create and validate
        $contact = request()->user()->contacts()->create($this->validateData());

        return (new ContactResource($contact))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Contact $contact)
    {
        // After creating a Contact Policy We Can Use It Here
        $this->authorize('view', $contact);

        return new ContactResource($contact);
    }

    public function update(Contact $contact)
    {
        $this->authorize('update', $contact);
        $contact->update($this->validateData());

        return (new ContactResource($contact))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);

        $contact->delete();

       return response([], Response::HTTP_NO_CONTENT);


    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birthday' => 'required',
            'company' => 'required',
        ]);
    }
}
