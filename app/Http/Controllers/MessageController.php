<?php
namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'num' => 'required|numeric|in:1,2',
            'user_text' => 'required|string|max:255'
        ]);

        if($request->num == 1)
            $method = 'get';
        elseif($request->num == 2)
            $method = 'post';

        $message = Message::create([
            'method' => $method,
            'content' => $request->user_text
        ]);

        return redirect()->route('show');
    }

    public function showMessages()
    {
        $messages = Message::oldest()->get();
        return view('messages', ['messages' => $messages]);
    }

    public function destroy($id)
    {
        $msg = Message::findOrFail($id);
        $msg->delete();

        return redirect()->route('show')->with('success', 'message has deleted');
    }
    
    public function create()
    {
        return view('messages_create');
    }

    public function storeForm(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'method' => 'required|in:GET,POST',
        ]);

        Message::create([
            'content' => $request->content,
            'method' => $request->method,
        ]);

        return redirect()->route('show');
    }

    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('messages_edit', compact('message'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'method' => 'required|in:GET,POST',
        ]);

        $message = Message::findOrFail($id);
        $message->update([
            'content' => $request->content,
            'method' => $request->method,
        ]);

        return redirect()->route('show'); // برمی‌گرده به لیست پیام‌ها
    }



}
