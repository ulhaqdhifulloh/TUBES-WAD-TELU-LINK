<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use App\Models\ForumQuestion;
use App\Models\AcademicInfo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get upcoming events
        $upcomingEvents = Event::where('event_date', '>=', Carbon::now())
            ->orderBy('event_date', 'asc')
            ->limit(3)
            ->get();

        // Get latest news
        $latestNews = News::with('organization')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        // Get recent forum questions
        $recentQuestions = ForumQuestion::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get upcoming deadlines for academic info
        $upcomingDeadlines = AcademicInfo::where('deadline', '>=', Carbon::now())
            ->orderBy('deadline', 'asc')
            ->limit(3)
            ->get();

        return view('dashboard', compact(
            'upcomingEvents',
            'latestNews',
            'recentQuestions',
            'upcomingDeadlines'
        ));
    }
}
