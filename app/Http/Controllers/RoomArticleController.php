<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomArticleRequest;
use App\Http\Requests\UpdateRoomArticleRequest;
use App\Repositories\RoomArticleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RoomArticleController extends AppBaseController
{
    /** @var RoomArticleRepository $roomArticleRepository*/
    private $roomArticleRepository;

    public function __construct(RoomArticleRepository $roomArticleRepo)
    {
        $this->roomArticleRepository = $roomArticleRepo;
    }

    /**
     * Display a listing of the RoomArticle.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $roomArticles = $this->roomArticleRepository->paginate(10);

        return view('room_articles.index')
            ->with('roomArticles', $roomArticles);
    }

    /**
     * Show the form for creating a new RoomArticle.
     *
     * @return Response
     */
    public function create()
    {
        return view('room_articles.create');
    }

    /**
     * Store a newly created RoomArticle in storage.
     *
     * @param CreateRoomArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomArticleRequest $request)
    {
        $input = $request->all();

        $roomArticle = $this->roomArticleRepository->create($input);

        Flash::success('Room Article saved successfully.');

        return redirect(route('roomArticles.index'));
    }

    /**
     * Display the specified RoomArticle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomArticle = $this->roomArticleRepository->find($id);

        if (empty($roomArticle)) {
            Flash::error('Room Article not found');

            return redirect(route('roomArticles.index'));
        }

        return view('room_articles.show')->with('roomArticle', $roomArticle);
    }

    /**
     * Show the form for editing the specified RoomArticle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomArticle = $this->roomArticleRepository->find($id);

        if (empty($roomArticle)) {
            Flash::error('Room Article not found');

            return redirect(route('roomArticles.index'));
        }

        return view('room_articles.edit')->with('roomArticle', $roomArticle);
    }

    /**
     * Update the specified RoomArticle in storage.
     *
     * @param int $id
     * @param UpdateRoomArticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomArticleRequest $request)
    {
        $roomArticle = $this->roomArticleRepository->find($id);

        if (empty($roomArticle)) {
            Flash::error('Room Article not found');

            return redirect(route('roomArticles.index'));
        }

        $roomArticle = $this->roomArticleRepository->update($request->all(), $id);

        Flash::success('Room Article updated successfully.');

        return redirect(route('roomArticles.index'));
    }

    /**
     * Remove the specified RoomArticle from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomArticle = $this->roomArticleRepository->find($id);

        if (empty($roomArticle)) {
            Flash::error('Room Article not found');

            return redirect(route('roomArticles.index'));
        }

        $this->roomArticleRepository->delete($id);

        Flash::success('Room Article deleted successfully.');

        return redirect(route('roomArticles.index'));
    }
}
