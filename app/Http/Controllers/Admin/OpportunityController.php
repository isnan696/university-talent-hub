<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use App\Services\ActivityLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OpportunityController extends Controller
{
    public function __construct(
        private OpportunityRepositoryInterface $opportunityRepository,
        private ActivityLogService $activityLogService,
    ) {}

    public function index()
    {
        $opportunities = $this->opportunityRepository->all();
        return view('admin.opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        return view('admin.opportunities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:200',
            'category' => 'required|string|max:50',
            'organizer' => 'required|string|max:150',
            'description' => 'required|string|max:2000',
            'registration_url' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:150',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('opportunities', 'public');
        }

        $data['created_by'] = Auth::id();
        $data['status'] = 'active';

        $opportunity = $this->opportunityRepository->create($data);

        $this->activityLogService->log(
            Auth::id(),
            'Create Opportunity',
            'Opportunity',
            "Created opportunity: {$opportunity->title}",
            $request
        );

        return redirect()->route('admin.opportunities.index')->with('success', 'Opportunity berhasil dibuat.');
    }

    public function edit(string $id)
    {
        $opportunity = $this->opportunityRepository->findById($id);
        return view('admin.opportunities.edit', compact('opportunity'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:200',
            'category' => 'required|string|max:50',
            'organizer' => 'required|string|max:150',
            'description' => 'required|string|max:2000',
            'registration_url' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:150',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,expired',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $opp = $this->opportunityRepository->findById($id);
            if ($opp->image) {
                Storage::disk('public')->delete($opp->image);
            }
            $data['image'] = $request->file('image')->store('opportunities', 'public');
        }

        $this->opportunityRepository->update($id, $data);

        return redirect()->route('admin.opportunities.index')->with('success', 'Opportunity berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $opp = $this->opportunityRepository->findById($id);
        if ($opp->image) {
            Storage::disk('public')->delete($opp->image);
        }
        $this->opportunityRepository->delete($id);

        return redirect()->route('admin.opportunities.index')->with('success', 'Opportunity berhasil dihapus.');
    }
}
