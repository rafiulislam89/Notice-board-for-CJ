<?php

namespace App\Http\Controllers;

use App\Data\Repositories\NoticeBoardRepository;
use App\Http\Requests\NoticeBoardRequest;
use Illuminate\Http\Request;
use App\Data\Models\NoticeBoard;




class NoticeBoardController extends Controller
{

    private $noticeBoardRepository;
    private $filePath = 'notice_boards';

    public function __construct(
        NoticeBoardRepository $noticeBoardRepository
    )
    {
        $this->noticeBoardRepository = $noticeBoardRepository;
    }


    public function index(Request $request)
    {
        $latestNotices = NoticeBoard::latest()->take(5)->get();

        $notice_boards = $this->noticeBoardRepository->getAllByCompanyId(getLoggedInUserCompanyId());
        $page_title = 'Notice Board Manager';
        $formTitle = 'Notice List';
        $page_description = '';

        $data = [
            'page_title' => $page_title,
            'page_description' => $page_description,
            'formTitle' => $formTitle,
            'notice_boards' => $notice_boards,
            'latestNotices' => $latestNotices,
        ];

        return view("{$this->filePath}.index", $data);
    }

    public function create(Request $request)
    {
        $page_title = 'Notice Board Manager';
        $page_description = '';
        $formTitle = 'Create New Notice';
        $data = [
            'page_title' => $page_title,
            'page_description' => $page_description,
            'formTitle' => $formTitle,
            'noticeStatus' => getActiveInactiveStatusList(),
            'noticePriority' => getNoticePriorityStatusList()
        ];

        return view("{$this->filePath}.create", $data);
    }

    public function store(NoticeBoardRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['company_id'] = getLoggedInUserCompanyId();
        $validatedData['created_by'] = getLoggedInUserId();
        $validatedData['updated_by'] = getLoggedInUserId();
        $validatedData['start_date'] = changeDateTimeFormat($request->start_date,'Y-m-d');
        $validatedData['end_date'] = changeDateTimeFormat($request->end_date,'Y-m-d');
        $this->noticeBoardRepository->create($validatedData);

        return redirect()->route("{$this->filePath}.index");
    }
    public function edit(Request $request, $id)
    {
        $noticeBoard = $this->noticeBoardRepository->findOrFail($id);
        $page_title = 'Notice Board Manager';
        $page_description = '';
        $formTitle = 'Update Notice';

        $data = [
            'page_title'        => $page_title,
            'page_description'  => $page_description,
            'formTitle'         => $formTitle,
            'noticeBoard'       => $noticeBoard,
            'noticeStatus'      => getActiveInactiveStatusList(),
            'noticePriority'    => getNoticePriorityStatusList()
        ];

        return view("{$this->filePath}.edit", $data);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required',
            'priority' => 'required',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $validatedData['updated_by'] = getLoggedInUserId();
        $validatedData['start_date'] = $request->start_date ? changeDateTimeFormat($request->start_date, 'Y-m-d') : null;
        $validatedData['end_date'] = $request->end_date ? changeDateTimeFormat($request->end_date, 'Y-m-d') : null;

        $noticeBoard = $this->noticeBoardRepository->findOrFail($id);
        $this->noticeBoardRepository->update($noticeBoard, $validatedData);

        return redirect()->route('notice_boards.index');
    }

}
