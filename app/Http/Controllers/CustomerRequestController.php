<?php

namespace App\Http\Controllers;

use App\Models\CustomerRequest;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class CustomerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display a listing of all customer requests
        
        return inertia('Admin/IndexCustomerRequest', [
            'customerRequests' => CustomerRequest::all()->map(function ($customer_request) {
                return [
                    'id' => $customer_request->id,
                    'name' => $customer_request->customerName,
                    'status' => $customer_request->status,
                    'island' => $customer_request->island,
                    'marina' => $customer_request->marina,
                    'email' => $customer_request->customerEmail,
                    'tel_phone' => $customer_request->customerTelPhone,
                    'created_at' => $customer_request->created_at->toFormattedDateString(),
                    'edit_url' => URL::route('editCustomerRequest', $customer_request->id),
                ];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate input
        $validated = $request->validate([
            'island.name' => 'required|string',
            'marina.name' => 'required|string',
            'list_file' => 'file',
            'contact_info.name' => 'required|string',
            'contact_info.email' => 'required|email',
            'contact_info.tel_phone' => 'nullable'
        ]);

        $newRequest = CustomerRequest::create([
            'status' => 'Received',
            'island' => $validated['island']['name'],
            'marina' => $validated['marina']['name'],
            'list_file' => $request->list_file->store('provision_lists'),
            'customerName' => $validated['contact_info']['name'],
            'customerEmail' => $validated['contact_info']['email'],
            'customerTelPhone' => $validated['contact_info']['tel_phone'],
        ]);

        return redirect(route('customerRequest.show', $newRequest->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerRequest  $customerRequest
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerRequest $customerRequest)
    {
        // show
        return inertia('Customer/Requests/View', ['customerRequest' => $customerRequest, 'listFileUrl' => $customerRequest->list_file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerRequest  $customerRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerRequest $customerRequest)
    {
        // only should be able to edit
        return inertia('EditCustomerRequest', 
        [
            'customerRequest' => $customerRequest,
            'listFileUrl' => $customerRequest->list_file, 
            'update_url' => URL::route('updateCustomerRequest', $customerRequest->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerRequest  $customerRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerRequest $customerRequest)
    {
        // update the status only for now
        $validation = $request->validate([
            'status' => "in:'Received,Processing,Out for Delivery,Complete,'"]);
        $customerRequest->update($validation);

        return redirect(route('allCustomerRequests'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerRequest  $customerRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerRequest $customerRequest)
    {
        //
    }
}
