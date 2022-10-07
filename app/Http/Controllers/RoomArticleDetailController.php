<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomArticleDetailRequest;
use App\Http\Requests\UpdateRoomArticleDetailRequest;
use App\Repositories\RoomArticleDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RoomArticleDetailController extends AppBaseController
{
    /** @var RoomArticleDetailRepository $roomArticleDetailRepository*/
    private $roomArticleDetailRepository;

    public function __construct(RoomArticleDetailRepository $roomArticleDetailRepo)
    {
        $this->roomArticleDetailRepository = $roomArticleDetailRepo;
    }

    /**
     * Display a listing of the RoomArticleDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $roomArticleDetails = $this->roomArticleDetailRepository->paginate(10);

        return view('room_article_details.index')
            ->with('roomArticleDetails', $roomArticleDetails);
    }

    /**
     * Show the form for creating a new RoomArticleDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('room_article_details.create');
    }

    /**
     * Store a newly created RoomArticleDetail in storage.
     *
     * @param CreateRoomArticleDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomArticleDetailRequest $request)
    {
        $input = $request->all();

        $roomArticleDetail = $this->roomArticleDetailRepository->create($input);

        Flash::success('Room Article Detail saved successfully.');

        return redirect(route('roomArticleDetails.index'));
    }

    /**
     * Display the specified RoomArticleDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomArticleDetail = $this->roomArticleDetailRepository->find($id);

        if (empty($roomArticleDetail)) {
            Flash::error('Room Article Detail not found');

            return redirect(route('roomArticleDetails.index'));
        }

        return view('room_article_details.show')->with('roomArticleDetail', $roomArticleDetail);
    }

    /**
     * Show the form for editing the specified RoomArticleDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomArticleDetail = $this->roomArticleDetailRepository->find($id);

        if (empty($roomArticleDetail)) {
            Flash::error('Room Article Detail not found');

            return redirect(route('roomArticleDetails.index'));
        }

        return view('room_article_details.edit')->with('roomArticleDetail', $roomArticleDetail);
    }

    /**
     * Update the specified RoomArticleDetail in storage.
     *
     * @param int $id
     * @param UpdateRoomArticleDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomArticleDetailRequest $request)
    {
        $roomArticleDetail = $this->roomArticleDetailRepository->find($id);

        if (empty($roomArticleDetail)) {
            Flash::error('Room Article Detail not found');

            return redirect(route('roomArticleDetails.index'));
        }

        $roomArticleDetail = $this->roomArticleDetailRepository->update($request->all(), $id);

        Flash::success('Room Article Detail updated successfully.');

        return redirect(route('roomArticleDetails.index'));
    }

    /**
     * Remove the specified RoomArticleDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomArticleDetail = $this->roomArticleDetailRepository->find($id);

        if (empty($roomArticleDetail)) {
            Flash::error('Room Article Detail not found');

            return redirect(route('roomArticleDetails.index'));
        }

        $this->roomArticleDetailRepository->delete($id);

        Flash::success('Room Article Detail deleted successfully.');

        return redirect(route('roomArticleDetails.index'));
    }
}
