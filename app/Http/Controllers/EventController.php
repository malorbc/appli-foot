<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClubRequest;
use App\Http\Requests\StoreEventRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use App\Models\EventUser;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::where('id', '1de8e3f5-6e35-4ec4-b222-98876b0dc50a')->get();
        return view('agenda.index', compact('event'));
    }

    public function create()
    {
        $clubId = auth()->user()->club_id;
        $joueurs = User::where('club_id', $clubId)->get();
        $category = Category::all();
        return view('agenda.create', compact('category', 'joueurs'));
    }

    public function store(StoreEventRequest $request)
    {
        function gen_uuid()
        {
            return sprintf(
                '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),

                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),

                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,

                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,

                // 48 bits for "node"
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff)
            );
        }

        if (!empty($request->end)) {
            $end = $request->end . "T" . $request->endHour;
        } else {
            $end = null;
        }

        if (empty($request->startHour)) {
            $start = $request->start;
        } else {
            $start = $request->start . "T" . $request->startHour;
        }

        $clubId = auth()->user()->club_id;

        $event = Event::create([
            'id' => gen_uuid(),
            'title' => $request->title,
            'start' => $start,
            'end' => $end,
            'description' => $request->description,
            'club_id' => $clubId,
            'categorie_id' => intval($request->category)
        ]);
        $event->save();

        foreach ($request->users as $user) {
            EventUser::create([
                'event_id' => $event->id,
                'user_id' => $user
            ]);
        }
        return redirect()->route('agenda.index');
    }

    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('agenda.edit', compact('event', 'categories'));
    }

    public function confirm($eventId)
    {

        $userId = auth()->user()->id;
        $event = EventUser::where('event_id', $eventId)->where('user_id',$userId)->limit(1);
        $args = [
            "event_id" => $eventId,
            "user_id" => $userId,
            "participation" => 1
        ];
        $event->update($args);
        return redirect()->route('dashboard');
    }

    public function show($eventId)
    {
        $event = Event::where('id', $eventId)->first();
        return view('agenda.show', compact('event'));
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function yes($status, $id){
        dd($status, $id);
    }
}
