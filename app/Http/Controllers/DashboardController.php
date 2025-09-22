<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Day;
use App\Models\Mood;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function index($username)
    // {
    //     $user = Auth::user();

    //     // Cocokkan username di URL dengan nama user yang sedang login
    //     if ($user->name !== $username) {
    //         abort(403, 'Unauthorized access');
    //     }

    //     $subscription = $user->subscription;

    //     return view('dashboard.index', compact('user', 'subscription'));
    // }
    public function index(User $user)
    {   
        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }
        $subscription = $user->subscription;
        $days = Day::orderBy('day_number', 'asc')->get();

        $daysLeft = null;
        $isExpired = true;

        if ($subscription) {
            $now = Carbon::now();
            $endDate = Carbon::parse($subscription->ends_at);

            if ($now->lessThanOrEqualTo($endDate)) {
                $isExpired = false;
                $daysLeft = floor($now->floatDiffInDays($endDate)); // pakai floor biar bulet ke bawah
            }
        }

        $answeredDays = Answer::where('user_id', $user->id)
            ->pluck('day_id')
            ->toArray();

        // Tandai locked/unlocked
        foreach ($days as $day) {
            if ($day->day_number == 1) {
                $day->is_locked = false; // Hari 1 selalu bisa diakses
            } else {
                $day->is_locked = !in_array($day->day_number - 1, 
                Day::whereIn('id', $answeredDays)->pluck('day_number')->toArray());
                // kunci kalau day sebelumnya belum ada jawaban
            }
        }

        return view('test.index', [
            'user' => $user,
            'subscription' => $subscription,
            'daysLeft' => $daysLeft,
            'isExpired' => $isExpired,
            'days' => $days,
        ]);
        // return view('test.index', [
        //     'user' => $user,
        //     'subscription' => $user->subscription,
        //     'days' => $days,
        // ]);
    }

    public function detail($slug, $day_number)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }

        $day = Day::where('day_number', $day_number)->firstOrFail();

        // Ambil semua answers user untuk day ini
        $answers = Answer::where('day_id', $day->id)
                    ->where('user_id', $user->id)
                    ->orderBy('created_at')
                    ->get();

        // Ambil semua questions untuk day ini
        $questions = Question::where('day_id', $day->id)->get()->keyBy('id');

        return view('test.list', [
            'user' => $user,
            'day' => $day,
            'questions' => $questions,
            'answers' => $answers,
        ]);
    }

    public function moodSelect($slug, $day_number)
    {
       $user = User::where('slug', $slug)->firstOrFail();
       $day = Day::where('day_number', $day_number)->firstOrFail();
       $moods = Mood::all();

       return view('test.mood', [
           'user' => $user,
           'day' => $day,
           'moods' => $moods
       ]);
    }

    public function showForm($slug, $day_number, $mood_id)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $question = Question::where('day_id', $day_number)
                            ->where('mood_id', $mood_id)
                            ->firstOrFail();

        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }

        $day = Day::where('day_number', $day_number)->first();

        return view('test.create', [
            'user' => $user,
            'day' => $day,
            'mood_id' => $mood_id,
            'question' => $question,
            'totalQuestions' => 3
        ]);
    }


    public function store(Request $request, $slug, $day_number, $mood_id)
    {
        // Cari user
        $user = User::where('slug', $slug)->firstOrFail();
        $day = Day::where('day_number', $day_number)->firstOrFail();
        $question_id = Question::where('day_id', $day_number)->where('mood_id', $mood_id)->first();
        // Validasi user login = owner
        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }

        // Validasi input
        $validated = $request->validate([
            'answer_1' => 'nullable|string',
            'answer_2' => 'nullable|string',
            'answer_3' => 'nullable|string',
        ]);

        // Simpan jawaban
        $answer = Answer::create([
            'user_id'   => $user->id,
            'day_id'    => $day->id,
            'question_id'    => $question_id->id,
            'answer_1'  => $validated['answer_1'] ?? null,
            'answer_2'  => $validated['answer_2'] ?? null,
            'answer_3'  => $validated['answer_3'] ?? null,
        ]);

        return redirect()
            ->route('list', ['slug' => $user->slug, 'day_number' => $day_number])
            ->with('success', 'Jawaban berhasil disimpan!');
    }

    public function edit($slug, $day_number, $ans_id)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }
        $totalQuestions = 3;
        $day = Day::where('day_number', $day_number)->firstOrFail();
        $answer = Answer::where('id', $ans_id)->where('user_id', $user->id)->firstOrFail();
        $question = Question::find($answer->question_id);
        $mood_id = $question->mood_id;

        return view('test.create', compact('user', 'day', 'answer', 'question', 'mood_id', 'totalQuestions'));
    }
    public function update(Request $request, $slug, $day_number, $ans_id)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }

        $answer = Answer::where('id', $ans_id)->where('user_id', $user->id)->firstOrFail();

        $data = $request->only(['answer_1', 'answer_2', 'answer_3']);
        $answer->update($data);

        return redirect()->route('list', [
            'slug' => $user->slug,
            'day_number' => $day_number
        ])->with('success', 'Jawaban berhasil diperbarui!');
    }

    public function refleksi($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized access');
        }

        // Ambil jawaban dengan relasi ke day & question & mood
        $answers = Answer::with(['day', 'question.mood'])
            ->where('user_id', $user->id)
            ->whereHas('day', function($q) {
                $q->whereBetween('day_number', [1, 3]);
            })
            ->get();

        // Group mood berdasarkan hari
        $moodByDay = $answers->groupBy(fn($ans) => $ans->day->day_number)
            ->map(function ($dayAnswers) {
                return $dayAnswers->groupBy(fn($ans) => $ans->question->mood->name ?? 'Unknown')
                    ->map->count();
            });

        // Hitung total mood keseluruhan
        $moodCounts = $answers->groupBy(fn($ans) => $ans->question->mood->name ?? 'Unknown')
            ->map->count();

        // Cari mood yang paling sering
        $mostMood = $moodCounts->sortDesc()->keys()->first() ?? 'tidak diketahui';

        $reflection = "Kamu lebih sering merasa {$mostMood}, tapi kamu tetap hadir. Itu luar biasa 💙";

        return view('test.refleksi', [
            'user'       => $user,
            'answers'    => $answers,
            'moodByDay'  => $moodByDay,
            'moodCounts' => $moodCounts,
            'reflection' => $reflection,
        ]);
    }

}
