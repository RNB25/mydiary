<?php

namespace App\Http\Controllers;

use App\Models\DiaryEntry;
use App\Models\Mood;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    public function index(User $user)
    {
        $entries = DiaryEntry::where('user_id', $user->id)
        ->orderBy('entry_date', 'desc')
        ->get();
        // Pastikan user yang login adalah yang diakses
        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }

        return view('dashboard.details', [
            'user' => $user,
            'subscription' => $user->subscription,
            'entries' => $entries,
        ]);
    }
    public function catatan(User $user)
    {
        // Pastikan user yang login adalah yang diakses
        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }
        $entries = DiaryEntry::where('user_id', $user->id)
        ->orderBy('entry_date', 'desc')
        ->get();

        return view('dashboard.card', [
            'user' => $user,
            'subscription' => $user->subscription,
            'entries' => $entries
        ]);
        // return view('dashboard.card', [
        //     'user' => $user,
        //     'subscription' => $user->subscription,
        // ]);
    }

    public function create(User $user)
    {
        // Pastikan user yang login adalah yang diakses
        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }
        $moods = Mood::all(); // atau orderBy('name')->get()
        // return view('dashboard.create', compact('moods'));
        return view('dashboard.diary.create', [
            'user' => $user,
            'subscription' => $user->subscription,
            'moods' => $moods,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mood' => 'required|string',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'entry_date' => 'nullable|date', // bisa otomatis isi hari ini
        ]);

        DiaryEntry::create([
            'user_id' => Auth::id(),
            // 'mood' => $request->mood,
            // 'title' => $request->title,
            'content' => $request->content,
            'entry_date' => $request->entry_date ?? now()->toDateString(),
        ]);

        return redirect()->route('detail.catatan.day', ['user' => Auth::user()->slug])->with('success', 'Cerita berhasil disimpan!');
    }

    public function detail(User $user)
    {
        // Pastikan user yang login adalah yang diakses
        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }
        $entries = DiaryEntry::where('user_id', $user->id)
        ->orderBy('entry_date', 'desc')
        ->get();

        return view('dashboard.card', [
            'user' => $user,
            'subscription' => $user->subscription,
            'entries' => $entries
        ]);
    }
    public function edit($slug, $id)
    {
        $user = User::where('slug', $slug)->firstOrFail();
         if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }
        $catatan = DiaryEntry::findOrFail($id);
        return view('dashboard.diary.details', compact('slug', 'catatan', 'user'));
    }

    public function update(Request $request, $slug, $id)
    {
        $request->validate([
            'mood' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $catatan = DiaryEntry::findOrFail($id);
        $catatan->update($request->all());
        
        $user = User::where('slug', $slug)->firstOrFail();
        $entries = DiaryEntry::where('user_id', $user->id)
        ->orderBy('entry_date', 'desc')
        ->get();
        return view('dashboard.card', [
                    'user' => $user,
                    'subscription' => $user->subscription,
                    'entries' => $entries
                ]);
    }

    public function destroy($slug, $id)
    {
        $catatan = DiaryEntry::findOrFail($id);
        $catatan->delete();

        $user = User::where('slug', $slug)->firstOrFail();
        $entries = DiaryEntry::where('user_id', $user->id)
        ->orderBy('entry_date', 'desc')
        ->get();
        return view('dashboard.card', [
                    'slug' => $slug,
                    'user' => $user,
                    'subscription' => $user->subscription,
                    'entries' => $entries
                ]);
    }
}
