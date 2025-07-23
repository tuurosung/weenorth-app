<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Services\Trades\TradeService;
use App\Traits\HandleResourceActions;
use App\Services\Members\MemberService;
use App\Services\Regions\RegionService;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Services\Districts\DistrictService;

class MemberController extends Controller
{
    use HandleResourceActions;

    public function __construct(
        protected $model = new Member(),
        private $modelName = "Member",
        public $memberService = new MemberService(),
        public $regionService = new RegionService(),
        public $districtService = new DistrictService(),
        public $tradesService = new TradeService()
    ) {}


    /**
     * Display a listing of the members.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('app.members.index', [
            'members' => $this->memberService->getMembers(),
            ...$this->memberService->formData()
        ]);
    }


    /**
     * Show the form for creating a new member.
     *
     * @param \App\Models\Member $member
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Member $member)
    {
        $member->load(['region', 'district', 'trade']);
        return view('app.members.show', compact('member'));
    }


    /**
     * Show the form for editing a member.
     *
     * @param \App\Models\Member $member
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Member $member)
    {
        return view('app.members.modals.edit', [
            'member' => $member,
            ...$this->memberService->formData()
        ]);
    }


    /**
     * Store a newly created member.
     *
     * @param \App\Http\Requests\StoreMemberRequest $request
     */
    public function store(StoreMemberRequest $request)
    {
        $this->memberService->dropCaches();

        return $this->handleStore($request->validated());
    }


    /**
     * Updates an existing member.
     *
     * @param \App\Http\Requests\UpdateMemberRequest $request
     * @param \App\Models\Member $member
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $this->memberService->dropCaches(); // Clear cache before updating

        return $this->handleUpdate($request, $member);
    }


    /**
     * Delete a member.
     *
     * @param \App\Models\Member $member
     */
    public function destroy(Member $member)
    {
        $this->memberService->dropCaches(); // Clear cache before deleting

        return $this->handleDelete($member);
    }
}
