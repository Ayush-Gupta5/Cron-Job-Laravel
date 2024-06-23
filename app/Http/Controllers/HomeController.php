<?php

namespace App\Http\Controllers;

use App\Models\EmailScheduler;
use App\Models\receiver;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index()
    {

        $receivers = receiver::all();
        return view('receiver', compact('receivers'));
    }

    public function updateStatus(Request $request)
    {
        $statues = $request->input('status', []);

        foreach ($statues as $id => $status) {
            $receiver = receiver::findOrFail($id);
            $receiver->Active = $status;
            $receiver->save();
        }

        return redirect()->route('home')->with('success', 'All statuses updated successfully.');
    }

    public function EmailSchedule()
    {
        return view('EmailSchedule');
    }

    public function ProcessSchedule(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $Schedule=EmailScheduler::create([
            'name'=>$request->name,
            'date'=>$request->date,
            'time'=>$request->time
        ]);

        return redirect()->route('EmailSchedule')->with('success', 'Email scheduled successfully.');

    }
}
