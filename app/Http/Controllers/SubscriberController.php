<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $subscribers = Subscriber::all();
            $total = $subscribers->count();
            if ($subscribers->isEmpty()) {
                throw new \Exception("No subscribers found.");
            }
            return response()->json([
                'subscribers' => $subscribers,
                'total' => $total,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'An error occurred while processing the request: ' . $e->getMessage()], 500);
        }
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriberRequest  $request)
    {
        try {
            Subscriber::create($request->validated());
            return response()->json( 'Subscriber created successfully');
        }catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }catch (\Throwable $e) {
            return response()->json(['error' => 'An error occurred while processing the request: ' . $e->getMessage()], 500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscriber $subscriber)
    {
        if (!$subscriber) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    
        return response()->json(['subscriber' => $subscriber], 200);
    }
    

    public function edit(Subscriber $subscriber)
    {
        try {
            return response()->json(['subscriber' => $subscriber], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Subscriber not found'], 404);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'An error occurred while processing the request: ' . $e->getMessage()], 500);
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscriberRequest $request, Subscriber $subscriber)
{
    try {
        $subscriber->update($request->validated());
        return response()->json([
            'message' => 'Subscriber updated successfully',
            'subscriber' => $subscriber
        ], 200);
    } catch (ModelNotFoundException $e) {
        return response()->json(['error' => 'Record not found'], 404);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return response()->json('Subscriber deleted Successfully');
    }
}
