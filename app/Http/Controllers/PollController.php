<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Http\Requests\StorePollRequest;
use App\Http\Requests\UpdatePollRequest;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polls = Poll::orderBy('created_at',"desc")->paginate(3);
        return view('page.poll-index', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePollRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Poll $poll)
    {
        return view('page.poll-vote', ['item'=>$poll]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poll $poll)
    {
        //
    }

    public function getAnswerOptions($poll_id, $response)
    {
        $answerOptions =  Poll::with("answerOptions")->findOrFail($poll_id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePollRequest $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poll $poll)
    {
        //
    }
}
